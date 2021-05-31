<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
use app\process\CrontabTask;
use framework\queue\redis\proccess\Consumer;

return [
    //定时任务
    'crontab' => [
        'enable' => true,
        'handler' => CrontabTask::class,
    ],
    'redis_consumer' => [
        'enable' => true,
        'handler' => Consumer::class,
        'count' => 1, // 可以设置多进程
        'constructor' => [
            // 消费者类目录
            'consumer_dir' => app_path() . '/queue'
        ]
    ]
];
