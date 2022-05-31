<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'global' => [
        \App\middleware\GlobalMiddleware::class,
    ],
    '/demo/index/*' => [
        \App\modules\demo\middleware\AuthMiddleware::class,
    ],
    '/demo/user/*' => [
        \App\modules\demo\middleware\AuthMiddleware::class,
    ]
];
