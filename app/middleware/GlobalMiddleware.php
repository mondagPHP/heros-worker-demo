<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\middleware;

use framework\bootstrap\Log;
use framework\http\Request;

class GlobalMiddleware
{
    public function handle(Request $request, array $vars, array $extVars, \Closure $next)
    {
        Log::info('GlobalMiddleware in');
        $res = $next($request, $vars, $extVars);
        Log::info('GlobalMiddleware out');
        return $res;
    }
}
