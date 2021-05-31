<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\middleware;

use app\exception\AuthException;
use framework\http\Request;

/**
 * Class AuthMiddleware
 * @package app\modules\demo\middleware
 */
class AuthMiddleware
{
    /**
     * @param Request $request
     * @param array $vars
     * @param array $extVars
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, array $vars, array $extVars, \Closure $next)
    {
        //验证登陆
        $session = $request->session();
        $data = $session->get('loginUser');
        if (empty($data)) {
            throw new AuthException();
        }
        return $next($request, $vars, $extVars);
    }
}
