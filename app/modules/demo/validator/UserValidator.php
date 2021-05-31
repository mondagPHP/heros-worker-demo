<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\modules\demo\validator;

use framework\validate\Validate;

/**
 * IndexAction 验证器
 * Class IndexLoginValidator
 * @package app\modules\demo\validator
 */
class UserValidator extends Validate
{
    //规则
    protected $rule = [
        'account' => 'require',
        'password' => 'require',
        'name' => 'require',
    ];

    //信息
    protected $message = [
        'account.require' => '参数account缺少',
        'password.require' => '参数password缺少',
        'name.require' => '参数password缺少',
    ];

    //建议方法名称对应
    protected $scene = [
        'add' => ['account', 'password', 'name']
    ];
}
