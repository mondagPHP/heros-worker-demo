<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\modules\demo\Controller;

use App\Modules\Demo\Middleware\AuthMiddleware;
use App\Modules\Demo\Service\UserService;
use App\Modules\Demo\Validator\UserValidator;
use App\Modules\Demo\Vo\UserAddVo;
use App\Modules\Demo\Vo\UserGetListVo;
use Framework\Annotation\Controller;
use Framework\Annotation\Inject;
use Framework\Annotation\RequestMapping;
use Framework\Annotation\Valid;
use Framework\Util\Res;

/**
 * Class UserAction
 * @package App\Modules\Demo\Action
 */
#[Controller(UserAction::class)]
class UserAction
{

    #[Inject]
    private UserService $service;

    /**
     * 添加用户，
     * @param UserAddVo $vo
     * @return Res
     */
    #[RequestMapping('/demo/user/add', '添加用户', ['POST'])]
    #[Valid(UserValidator::class, 'add')]
    public function add(UserAddVo $vo): Res
    {
        $user = $this->service->add($vo);
        if ($user) {
            return Res::ok()->data($user->toArray());
        }
        return Res::error()->message('添加失败');
    }

    /**
     * 获取用户列表
     * @param UserGetListVo $vo
     * @return Res
     */
    #[RequestMapping('/demo/user/getList', '获取用户列表', ['GET'])]
    public function getList(UserGetListVo $vo): Res
    {
        [$data, $total] = $this->service->getList($vo);
        return Res::pager($total, $data);
    }
}
