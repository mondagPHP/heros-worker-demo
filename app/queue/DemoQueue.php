<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\queue;

use framework\bootstrap\Log;
use framework\queue\redis\Consumer;

class DemoQueue implements Consumer
{
    //要消费的队列名
    public $queue = 'demo';

    // 连接名，对应 config/redis_queue.php 里的连接`
    public $connection = 'default';

    public function consume($data)
    {
        Log::debug('demo queue receive: ' . $data);
    }
}
