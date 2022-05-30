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
    'max_request' => env_config('server_max_request', 100000),
    'max_package_size' => 10 * 1024 * 1024,
    'stdout_file' => runtime_path() . '/stdout.log',
    'log_file' => runtime_path() . '/serverLog.log',

    'listen' => env_config('server_listen', 'http://127.0.0.1:8082'),
    'transport' => env_config('server_transport', 'tcp'),
    'context' => [],
    'name' => env_config('app_name', 'heros-worker-demo'),
    'count' => env_config('server_process_count', cpu_count() / 2),
    'user' => env_config('server_process_user', ''),
    'group' => env_config('server_process_group', ''),


];
