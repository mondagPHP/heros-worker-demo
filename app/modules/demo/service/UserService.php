<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\modules\demo\service;

use App\entity\demo\User;
use App\modules\demo\vo\UserAddVo;
use App\modules\demo\vo\UserGetListVo;
use Framework\Annotation\Service;

/**
 * Class UserService
 * @package App\modules\demo\service
 * @Service
 */
#[Service(IndexService::class)]
class UserService
{

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
     * @return array
     */
    public function getList(UserGetListVo $vo): array
    {
        $data = [];
        $list = User::query()
            ->orderByDesc('created_at')
            ->paginate($vo->getPageSize(), ['*'], 'page', $vo->getPage());
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
