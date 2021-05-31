<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\service;

use framework\annotations\Service;

/**
 * Class IndexService
 * @package app\modules\demo\service
 * @Service
 */
class IndexService
{
    /**
     * @param string $id
     * @return string[]
     */
    public function userInfo(string $id): array
    {
        return [
            'id' => $id,
            'name' => 'tom',
        ];
    }
}
