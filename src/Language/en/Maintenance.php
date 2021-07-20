<?php

/**
 * This file is part of ASchm Maintenance.
 *
 * (c) 2021 Alexander Schmitz
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

return [
    // Status
    'status'        => 'Status',
    'statusOffline' => 'Offline',
    'statusOnline'  => 'Online',
    // Offline
    'offlineSince'  => 'Offline since: ',
    'allowedGroups' => 'Allowed groups: ',
    // Form buttons
    'buttons' => [
        'up'   => 'Enable Live-Mode',
        'down' => 'Enable Maintenance',
    ],
    // Messages
    'serverDownMessage' => 'The website is being maintained and is not available right now. Please try again later.',
    'actionFailed'      => 'Maintenance mode could not be changed!',
    'actionSuccess'     => [
        'up'   => 'Succssfully disabled maintenance.',
        'down' => 'Succssfully ensabled maintenance.',
    ],
];
