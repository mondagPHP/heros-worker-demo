<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
use framework\http\Response;

if (! function_exists('packResult')) {
    function packResult($result): Response
    {
        $header = [
            'Content-Type' => 'application/json;charset=utf-8'
        ];
        if ($result instanceof Response) {
            return $result;
        }
        return response((string)$result, 200, $header);
    }
}
