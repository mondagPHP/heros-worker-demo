<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\service;

use app\entity\demo\User;
use app\modules\demo\dao\UserDao;
use app\modules\demo\vo\UserAddVo;
use app\modules\demo\vo\UserGetListVo;
use framework\annotations\Resource;
use framework\annotations\Service;

/**
 * Class UserService
 * @package app\modules\demo\service
 * @Service
 */
class UserService
{
    /**
     * @var UserDao $dao
     * @Resource
     */
    private $dao;

    public function add(UserAddVo $vo)
    {
        return $this->dao->add($vo);
    }

    /**
     * @param UserGetListVo $vo
     * @return array
     */
    public function getList(UserGetListVo $vo): array
    {
        $data = [];
        $list = $this->dao->getList($vo);
        /** @var User $user */
        foreach ($list->items() as $user) {
            $data[] = [
                'id' => $user->id,
                'name' => $user->name,
                'account' => $user->account,
                'password' => $user->password,
            ];
        }
        return [$data, $list->total()];
    }
}
