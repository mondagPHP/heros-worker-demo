<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
use framework\bootstrap\Container;
use framework\bootstrap\Heartbeat;
use framework\bootstrap\LaravelDB;
use framework\bootstrap\Log;
use framework\bootstrap\Redis;
use framework\bootstrap\Session;

//  自动加载类
return [
    Container::class,
    Redis::class,
    LaravelDB::class,
    Session::class,
    Log::class,
    Heartbeat::class,
];
