<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace App\modules\demo\validator;

use Framework\Validate\Validate;

/**
 * IndexAction 验证器
 * Class IndexLoginValidator
 * @package App\modules\demo\validator
 */
class IndexValidator extends Validate
{
    //规则
    protected array $rule = [
        'account' => 'require',
        'password' => 'require',
    ];

    //信息
    protected array $message = [
        'account.require' => '参数account缺少',
        'password.require' => '参数password缺少',
    ];

    //建议方法名称对应
    protected array $scene = [
        'login' => ['account', 'password'],
    ];
}
