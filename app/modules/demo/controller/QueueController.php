<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\controller;

use framework\annotations\Controller;
use framework\annotations\RequestMapping;
use framework\bootstrap\Log;
use framework\core\AbstractController;
use framework\queue\redis\Client;
use framework\util\Result;

/**
 * Class QueueController
 * @package app\modules\demo\controller
 * @Controller(msg="")
 */
class QueueController extends AbstractController
{
    public function _initialize()
    {
        //doSomething init
        //such as 配置一些局部中间件
        //$this->middleware()
    }

    /**
     * 向队列发送消息
     * @return Result
     * @RequestMapping(value="/demo/queue/send/{msg:[a-z]+}", method={"get"}, msg="向队列发送消息")
     */
    public function send($msg): Result
    {
        Client::send('demo', $msg);
        Log::debug('QueueController::send: ' . $msg);
        return Result::ok()->data(['msg' => $msg]);
    }
}
