<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\Modules\Demo\Action;

use App\Modules\Demo\Service\IndexService;
use Framework\Annotation\Controller;
use Framework\Annotation\Inject;
use Framework\Annotation\RequestMapping;
use Framework\Http\HttpRequest;
use Framework\Util\Res;

/**
 * Class IndexAction
 * @package App\Modules\Demo\Action
 */
#[Controller(IndexAction::class)]
class IndexAction
{

    #[Inject]
    protected IndexService $service;

    /**
     * 模板引擎
     */
    #[RequestMapping('/', 'index', ['GET'])]
    public function index()
    {
        assign('title', 'heros-worker-demo');
        return view('demo/index');
    }

    /**
     * @param HttpRequest $request
     * @return Res
     */
    #[RequestMapping('/demo/index/test', 'test', ['GET'])]
    public function test(HttpRequest $request): Res
    {
        return Res::ok();
    }

    /**
     * 通过服务获取用户信息
     * @param $id
     * @return Res
     */
    #[RequestMapping('/demo/index/userInfo/{id:[0-9A-Z]+}', 'userInfo', ['GET'])]
    public function userInfo($id): Res
    {
        return Res::ok()->data($this->service->userInfo($id));
    }

    /**
     * 退出
     * @param HttpRequest $request
     * @return Res
     * @RequestMapping(value="/demo/index/logout", msg="logout")
     */
    public function logout(HttpRequest $request): Res
    {
        $session = $request->session();
        $session->flush();
        return Res::ok()->message('退出成功');
    }
}
