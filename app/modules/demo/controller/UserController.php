<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\Controller;

use app\modules\demo\middleware\AuthMiddleware;
use app\modules\demo\service\UserService;
use app\modules\demo\vo\UserAddVo;
use app\modules\demo\vo\UserGetListVo;
use framework\annotations\Controller;
use framework\annotations\RequestMapping;
use framework\annotations\Resource;
use framework\core\AbstractController;
use framework\util\Result;

/**
 * Class UserController
 * @package app\modules\demo\Controller
 * @Controller(msg="")
 */
class UserController extends AbstractController
{
    /**
     * @var UserService $service
     * @Resource
     */
    private $service;

    public function _initialize()
    {
        $this->middleware(AuthMiddleware::class);
    }

    /**
     * @return Result
     * @RequestMapping(value="/app/modules/demo/Controller/UserController/test", method={"get"}, msg="test")
     */
    public function test(): Result
    {
        return Result::ok();
    }

    /**
     * 添加用户，
     * @param UserAddVo $vo
     * @RequestMapping(value="/demo/user/add", method={"get", "post"}, msg="添加用户")
     * @return Result
     */
    public function add(UserAddVo $vo): Result
    {
        $user = $this->service->add($vo);
        if ($user) {
            return Result::ok()->data($user->toArray());
        }
        return Result::error()->message('添加失败');
    }

    /**
     * 获取用户列表
     * @param UserGetListVo $vo
     * @return Result
     * @RequestMapping(value="/demo/user/getList", method={"get"}, msg="获取用户列表")
     */
    public function getList(UserGetListVo $vo): Result
    {
        [$data, $total] = $this->service->getList($vo);
        return Result::pager($vo->getPage(), $vo->getPageSize(), $total, $data);
    }
}
