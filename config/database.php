<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'default' => [
        'driver' => env('db_default_driver', 'mysql'),
        'host' => env('db_default_host', '127.0.0.1'),
        'port' => env('db_default_port', '3306'),
        'database' => env('db_default_database', 'test'),
        'username' => env('db_default_username', 'root'),
        'password' => env('db_default_password', '12345678'),
        'charset' => env('db_default_charset', 'utf8'),
        'collation' => env('db_default_collation', 'utf8_unicode_ci'),
        'prefix' => '',
    ],
];
