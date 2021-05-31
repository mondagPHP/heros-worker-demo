<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\vo;

use framework\annotations\Validator;
use framework\vo\RequestVoInterface;

/**
 * 登陆LoginVo
 * @package app\modules\demo\vo
 * @Validator(class="app\modules\demo\validator\IndexValidator", scene="login")
 */
class LoginVo implements RequestVoInterface
{
    private $account;
    private $password;

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account): void
    {
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}
