<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\process;

use app\cron\TestCron;
use framework\core\ICron;
use framework\crontab\Crontab;

class CrontabTask implements ICron
{
    public function onWorkerStart()
    {
        // 每分钟的第1秒执行.
       // new Crontab('1 * * * * *', [new TestCron(), 'onWorkerStart']);
    }
}
