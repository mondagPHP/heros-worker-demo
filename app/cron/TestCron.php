<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\cron;

use framework\bootstrap\Log;
use framework\core\ICron;

/**
 * Class TestCron
 * @package app\cron
 */
class TestCron implements ICron
{
    public function onWorkerStart()
    {
        Log::info('TestCron run tick:' . date('Y-m-d H:i:s'));
    }
}
