<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'default' => [
        'host' => env('redis_host', '127.0.0.1'),
        'password' => env('redis_password', null),
        'port' => env('redis_port', 6379),
        'database' => env('redis_db', 0),
        'prefix' => '',
    ],
];
