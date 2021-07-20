<?php

/**
 * This file is part of ASchm Maintenance.
 *
 * (c) 2021 Alexander Schmitz
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use ASchm\Maintenance\Controllers\MaintenanceController;
use CodeIgniter\Events\Events;

// Catch maintenance mode
Events::on('pre_system', MaintenanceController::class . '::check');
