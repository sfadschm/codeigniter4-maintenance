<?php

namespace ASchm\Maintenance\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use Myth\Auth\Controllers\AuthController;

/**
 * Class MaintenanceController
 *
 * Controller for activating and disabling the maintenance mode.
 */
class MaintenanceController extends Controller
{

    /**
     * The callable maintenance functions.
     *
     * @var array
     */
    private array $legalActions = [
        'up',
        'down',
    ];

    /**
     * Displays the current maintenance status and allows
     * changing the state.
     *
     * @return array
     */
    public static function status(): array
    {
        // Load config
        $config = config('Maintenance');

        // Store offline status
        $data = [
            'offline' => file_exists($config->filePath),
        ];

        // Load maintenance information if down
        if ($data['offline']) {
            $data = array_merge($data, json_decode(file_get_contents($config->filePath), true));
        }

        return $data;
    }

    /**
     * Check whether the app is in maintenance mode.
     *
     * @return bool
     */
    public static function check()
    {
        // Load config
        $config = config('Maintenance');

        // Continue if maintenance file does not exist
        if (! file_exists($config->filePath)) {
            return true;
        }

        // Load JSON data from maintenance file
        $data = json_decode(file_get_contents($config->filePath), true);

        // Allow users based on defined groups
        helper('auth');
        if (logged_in() && array_intersect(user()->getRoles(), $data['allowed_groups']) !== []) {
            // User is allowed
            return true;
        }

        // Set unavailable status code
        service('response')->setStatusCode(503);

        // Setup AuthController
        $auth = new AuthController();

        // User cannot enter app in maintenance mode
        return $auth->logout()->with('error', lang('Maintenance.serverDownMessage'));
    }

    /**
     * Enables or disables the maintenance mode.
     */
    public function toggle()
    {
        // Get POST data
        $action = $this->request->getPost('action');

        // Toggle maintenance mode
        if (in_array($action, $this->legalActions, true)) {
            self::{$action}();

            return redirect()->back()->with('message', lang('Maintenance.actionSuccess.' . $action));
        }

        // Show error if fail
        return redirect()->back()->with('error', lang('Maintenance.actionFailed'));
    }

    /**
     * Disables the maintenance mode.
     *
     * @return void
     */
    private static function up(): void
    {
        // Load config
        $config = config('Maintenance');

        // Delete the maintenance file
        @unlink($config->filePath);
    }

    /**
     * Enables the maintenane mode.
     *
     * @param array $allowedGroups
     *
     * @return void
     */
    private static function down(array $allowedGroups = []): void
    {
        // Load config
        $config = config('Maintenance');

        // Add superadmin to allowed groups
        $allowedGroups = array_unique(array_merge($config->allowedGroups, $allowedGroups, ['superadmin']));

        // Create directory if not exist
        $dir = dirname($config->filePath);
        if (! is_dir($dir)) {
            mkdir($dir);
        }

        // Write the maintenance file
        file_put_contents(
            $config->filePath,
            json_encode(
                ["time" => strtotime(Time::now(app_timezone())), "allowed_groups" => $allowedGroups],
                JSON_PRETTY_PRINT
            )
        );
    }
}
