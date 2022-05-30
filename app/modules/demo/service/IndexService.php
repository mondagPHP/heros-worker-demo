<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\modules\demo\service;

use Framework\Annotation\Service;

/**
 * Class IndexService
 * @package App\modules\demo\service
 */
#[Service(IndexService::class)]
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
