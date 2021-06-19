<?php

namespace ASchm\Maintenance\Config;

use CodeIgniter\Config\BaseConfig;

class Maintenance extends BaseConfig
{

    /**
     * The path to store the maintenance file
     *
     * @var string
     */
    public $filePath = WRITEPATH . 'system/down';

    /**
     * The user groups (from Myth\Auth) that are allowed
     * to visit the page during maintenance.
     *
     * @var array<int, string>
     */
    public $allowedGroups = [
        'superadmin',
    ];
}
