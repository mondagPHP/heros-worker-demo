<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'default' => [
        'host' => 'redis://' . env('redis_host') . ':' . env('redis_port', 6379),
        'options' => [
            'auth' => env('redis_password'),     // 密码，可选参数
            'db' => env('redis_db'),      // 数据库
            'max_attempts' => 10, // 消费失败后，重试次数
            'retry_seconds' => 5, // 重试间隔，单位秒
        ]
    ]
];
