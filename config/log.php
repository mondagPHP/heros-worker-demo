<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
return [
    'default' => [
        'handlers' => [
            [
                'class' => Monolog\Handler\RotatingFileHandler::class,
                'constructor' => [
                    runtime_path() . '/logs/worker.log',
                    0,
                    ENV === 'dev' ? Monolog\Logger::DEBUG : Monolog\Logger::INFO,
                ],
                'formatter' => [
                    'class' => Monolog\Formatter\LineFormatter::class,
                    'constructor' => [null, 'Y-m-d H:i:s', false],
                ],
            ],
        ],
    ],
];
