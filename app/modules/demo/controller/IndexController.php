<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\controller;

use app\modules\demo\middleware\AuthMiddleware;
use app\modules\demo\service\IndexService;
use app\modules\demo\vo\LoginVo;
use framework\annotations\Controller;
use framework\annotations\RequestMapping;
use framework\annotations\Resource;
use framework\core\AbstractController;
use framework\http\Request;
use framework\http\Session;
use framework\string\StringUtils;
use framework\util\Result;

/**
 * Class IndexAction
 * @package app\modules\demo\action
 * @Controller(msg="IndexAction")
 */
class IndexController extends AbstractController
{
    /**
     * @var IndexService $service
     * @Resource
     */
    private $service;

    public function _initialize()
    {
        //doSomething init
        //such as 配置一些局部中间件
        //$this->middleware()
        $this->middleware(AuthMiddleware::class, [], ['only' => 'logout']);
    }

    /**
     * 模板引擎
     * @RequestMapping(value="/", method={"get"}, msg="test")
     */
    public function index()
    {
        assign('title', 'heros-worker-demo');
        return view('demo/index');
    }

    /**
     * @param Request $request
     * @return Result
     * @RequestMapping(value="/demo/index/test", method={"get"}, msg="test")
     */
    public function test(Request $request): Result
    {
        return Result::ok();
    }

    /**
     * 通过服务获取用户信息
     * @param $id
     * @return Result
     * @RequestMapping(value="/demo/index/userInfo/{id:[0-9A-Z]+}", method={"get"}, msg="userInfo")
     */
    public function userInfo($id): Result
    {
        return Result::ok()->data($this->service->userInfo($id));
    }

    /**
     * 登陆
     * @param LoginVo $vo
     * @param Session $session
     * @return Result
     * @RequestMapping(value="/demo/index/login", method={"post", "get"}, msg="login")
     */
    public function login(LoginVo $vo, Session $session): Result
    {
        $data = [
            'account' => $vo->getAccount(),
            'password' => $vo->getPassword(),
        ];
        $session->set('loginUser', StringUtils::jsonEncode($data));
        return Result::ok()->data($data);
    }

    /**
     * 退出
     * @param Session $session
     * @return Result
     * @RequestMapping(value="/demo/index/logout", msg="logout")
     */
    public function logout(Session $session): Result
    {
        $session->flush();
        return Result::ok()->message('退出成功');
    }
}
