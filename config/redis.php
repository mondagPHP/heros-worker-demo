<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'default' => [
        'host' => env_config('redis_host', '127.0.0.1'),
        'password' => env_config('redis_password', null),
        'port' => env_config('redis_port', 6379),
        'database' => env_config('redis_db', 0),
        'prefix' => '',
    ],
];
