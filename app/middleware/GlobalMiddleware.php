<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\middleware;

use Framework\Core\Log;
use Framework\Http\HttpRequest;

class GlobalMiddleware
{
    public function process(HttpRequest $request, \Closure $next)
    {
        Log::info('GlobalMiddleware in');
        $res = $next($request);
        Log::info('GlobalMiddleware out');
        return $res;
    }
}
