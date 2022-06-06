<?php
declare(strict_types=1);

namespace App\Process;

use App\Cron\HelloLog;
use Framework\Crontab\CrontabTask;

class Cron extends CrontabTask
{
    protected static array $cronList = [
        [
            'rule' => '0/10 * * * * *',  //每次间隔10s中执行一次.
            'task' => [HelloLog::class, 'hello'],  //处理类和执行方法
            'memo' => '定时日志记录hello'  //备注可选
        ]
    ];
}