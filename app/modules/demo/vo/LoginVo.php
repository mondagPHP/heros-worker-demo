<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\modules\demo\vo;

use Framework\Annotation\VO;

/**
 * 登陆LoginVo
 * @package App\modules\demo\vo
 * @Validator(class="App\modules\demo\validator\IndexValidator", scene="login")
 */
#[VO]
class LoginVo
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
