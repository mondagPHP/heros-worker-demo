<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\aspect;

use app\modules\demo\controller\QueueController;
use framework\aop\AbstractAspect;
use framework\aop\interfaces\ProceedingJoinPointInterface;
use framework\bootstrap\Log;

/**
 * Class QueueAspect
 * @package app\aspect
 */
class QueueAspect extends AbstractAspect
{
    public $classes = [
        QueueController::class . '::send'
    ];

    /**
     * @param ProceedingJoinPointInterface $entryClass
     * @return mixed
     */
    public function process(ProceedingJoinPointInterface $entryClass)
    {
        Log::debug('QueueAspect in');
        $res = $entryClass->process();
        Log::debug('QueueAspect out');
        return $res;
    }
}
