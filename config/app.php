<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'version' => 1,
    'app_name' => env('app_name', 'heros-worker-demo'),
    'debug' => env('app_debug', false),
    'default_timezone' => env('app_timezone', 'Asia/Shanghai'),

    //扫描地址
    'scan_dir' => BASE_PATH . '/app',
    'scan_root_namespace' => 'app\\',
];
