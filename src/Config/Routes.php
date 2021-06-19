<?php

/*
 * ASchm:Maintenance routes files.
 */
// @phpstan-ignore-next-line
$routes->group('', ['namespace' => 'ASchm\Maintenance\Controllers', 'filter' => 'role:superadmin'], static function ($routes) {
    // Setting/Unsetting
    $routes->post('Maintenance', 'MaintenanceController::toggle');
});
