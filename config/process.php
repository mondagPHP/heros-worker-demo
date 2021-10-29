<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
use app\process\CrontabTask;
use app\process\InotifyFileMonitor;
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
    ],
    'bl-file-monitor' => [
       'enable' => ENV === 'dev',
       'handler' => InotifyFileMonitor::class,
       'constructor' => [
           // 监控这些目录
           'monitor_dir' => [
               app_path(), config_path(), BASE_PATH . '/view',
           ],
           // 监控这些后缀的文件
           'monitor_extensions' => [
               'php', 'html',
           ],
       ],
   ],
];
