<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'version' => 1,
    'app_name' => env_config('app_name', 'heros-worker-demo'),
    'debug' => env_config('app_debug', false),
    'default_timezone' => env_config('app_timezone', 'Asia/Shanghai'),

    //扫描地址
    'scan_dir' => BASE_PATH . '/app',
    'scan_root_namespace' => 'App\\',

    //定时任务异步处理worker
    'async_worker' => 'tcp://127.0.0.1:8182'
];
