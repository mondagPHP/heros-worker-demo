<?php
declare(strict_types=1);

namespace App\Modules\Demo\Action;


use App\Modules\Demo\Validator\IndexValidator;
use App\Modules\Demo\Vo\LoginVo;
use Framework\Annotation\Controller;
use Framework\Annotation\RequestMapping;
use Framework\Annotation\Valid;
use Framework\Http\HttpRequest;
use Framework\Util\Res;
use Monda\Utils\String\StringUtil;

#[Controller(LoginAction::class)]
class LoginAction {

    /**
     * 登陆
     * @param LoginVo $vo
     * @param HttpRequest $request
     * @return Res
     */
    #[RequestMapping('/demo/login/login', 'login', ['POST'])]
    #[Valid(IndexValidator::class, 'login')]
    public function login(LoginVo $vo, HttpRequest $request): Res
    {
        $data = [
            'account' => $vo->getAccount(),
            'password' => $vo->getPassword(),
        ];
        $session = $request->session();
        $session->set('loginUser', StringUtil::jsonEncode($data));
        return Res::ok()->data($data);
    }
}