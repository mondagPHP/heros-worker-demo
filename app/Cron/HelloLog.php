<?php
declare(strict_types=1);

namespace App\Cron;

use Framework\Core\Log;

class HelloLog
{
    public function hello()
    {
        Log::info('cron hello');
    }
}