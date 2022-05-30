<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'default' => [
        'driver' => env_config('db_default_driver', 'mysql'),
        'host' => env_config('db_default_host', '127.0.0.1'),
        'port' => env_config('db_default_port', '3306'),
        'database' => env_config('db_default_database', 'test'),
        'username' => env_config('db_default_username', 'root'),
        'password' => env_config('db_default_password', '12345678'),
        'charset' => env_config('db_default_charset', 'utf8'),
        'collation' => env_config('db_default_collation', 'utf8_unicode_ci'),
        'prefix' => '',
    ],
];
