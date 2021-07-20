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
    'offlineSince'  => 'Offline seit: ',
    'allowedGroups' => 'Zugelassene Gruppen: ',
    // Form buttons
    'buttons' => [
        'up'   => 'Live-Modus aktivieren',
        'down' => 'Wartungsmodus aktivieren',
    ],
    // Messages
    'serverDownMessage' => 'Die Webseite wird gerade gewartet und steht nicht zur Verfügung. Versuche es in ein paar Minuten nochmal.',
    'actionFailed'      => 'Die Änderung am Wartungsmodus konnte nicht durchgeführt werden!',
    'actionSuccess'     => [
        'up'   => 'Wartungsmodus erfolgreich deaktiviert.',
        'down' => 'Wartungsmodus erfolgreich aktiviert.',
    ],
];
