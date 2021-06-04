<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    //master
    'pid_file' => runtime_path() . '/worker.pid',
    'max_request' => env('server_max_request', 100000),
    'max_package_size' => 10 * 1024 * 1024,
    'stdout_file' => runtime_path() . '/stdout.log',

    //http 进程
    'http' => [
        'enable' => true,
        'listen' => env('server_listen', 'http://127.0.0.1:8081'),
        'transport' => env('server_transport', 'tcp'),
        'context' => [],
        'name' => env('app_name', 'heros-worker-demo'),
        'count' => env('server_process_count', cpu_count() / 2),
        'user' => env('server_process_user', ''),
        'group' => env('server_process_group', ''),
        'max_request' => env('server_max_request', 100000),
    ],
    'global_data' => [
        'enable' => false,
        'ip' => env('global_data_host', '127.0.0.1'),
        'port' => env('global_data_port', 2207),
    ],
];
