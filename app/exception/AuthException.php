<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\exception;

use framework\http\Response;
use framework\util\Result;

class AuthException extends \RuntimeException
{
    public function render(): Response
    {
        return packResult(Result::error()->code('002')->message('登陆超时，请重新登陆'));
    }
}
