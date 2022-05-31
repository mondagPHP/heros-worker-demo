<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\Exception;


use Framework\Http\HttpResponse;
use Framework\Util\Res;

class AuthException extends \RuntimeException
{
    public function render(): HttpResponse
    {
        return new HttpResponse(200, ['Content-Type' => 'application/json'], Res::error()->code('002')->message('登陆超时，请重新登陆')->toJson()) ;
    }
}
