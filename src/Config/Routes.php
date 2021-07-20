<?php

/**
 * This file is part of ASchm Maintenance.
 *
 * (c) 2021 Alexander Schmitz
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// @phpstan-ignore-next-line
$routes->group('', ['namespace' => 'ASchm\Maintenance\Controllers', 'filter' => 'role:superadmin'], static function ($routes) {
    // Setting/Unsetting
    $routes->post('Maintenance', 'MaintenanceController::toggle');
});
