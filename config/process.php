<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */

return [

    'ws' => [
        'enable' => false,
        'listen' => 'websocket://0.0.0.0:8181',
        'handler' => \App\Process\WebSocket::class
    ],

    'fileMonitor' => [
        'enable' => false,
        'handler' => \Framework\Process\Monitor::class,
        'constructor' => [
            [__DIR__ . '/../app'],
            ['php', 'html']
        ]
    ],

    'cron' => [
        'enable' => false,
        'handler' => \App\Process\Cron::class
    ],
    //定时任务异步处理worker
    'cronAsyncWorker' => [
        'enable' => false,
        'listen' => 'tcp://127.0.0.1:8182',
        'handler' => \Framework\Crontab\AsyncTaskWorker::class,
        'count' => 2
    ]

];
