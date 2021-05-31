<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\dao;

use app\entity\demo\User;
use app\modules\demo\vo\UserAddVo;
use app\modules\demo\vo\UserGetListVo;
use framework\annotations\Dao;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class UserDao
 * @package app\modules\demo\dao
 * @Dao
 */
class UserDao
{
    /**
     * @param UserAddVo $vo
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function add(UserAddVo $vo)
    {
        return User::query()->create([
            'name' => $vo->getName(),
            'account' => $vo->getAccount(),
            'password' => $vo->getPassword(),
        ]);
    }

    /**
     * @param UserGetListVo $vo
     * @return LengthAwarePaginator
     */
    public function getList(UserGetListVo $vo): LengthAwarePaginator
    {
        return User::query()
            ->orderByDesc('created_at')
            ->paginate($vo->getPageSize(), ['*'], 'page', $vo->getPage());
    }
}
