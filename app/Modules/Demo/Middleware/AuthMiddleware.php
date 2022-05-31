<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\Modules\Demo\Middleware;

use App\Exception\AuthException;
use Framework\Http\HttpRequest;

/**
 * Class AuthMiddleware
 * @package App\Modules\Demo\Middleware
 */
class AuthMiddleware
{
    /**
     * @param HttpRequest $request
     * @param \Closure $next
     * @return mixed
     */
    public function process(HttpRequest $request, \Closure $next)
    {
        //验证登陆
        $session = $request->session();
        $data = $session->get('loginUser');
        if (empty($data)) {
            throw new AuthException();
        }
        return $next($request);
    }
}
