<?php

use ASchm\Maintenance\Controllers\MaintenanceController;
use CodeIgniter\Events\Events;

// Catch maintenance mode
Events::on('pre_system', MaintenanceController::class . '::check');
