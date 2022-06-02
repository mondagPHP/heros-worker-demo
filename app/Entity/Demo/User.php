<?php

declare (strict_types=1);
namespace App\Entity\Demo;

use Carbon\Carbon;
use Framework\Database\HeroModel;
/**
 * Class User
 * @property int $id 
 * @property string $name 姓名
 * @property string $account 账户
 * @property string $password 密码
 * @property Carbon $created_at 
 * @property Carbon $updated_at 
 */
class User extends HeroModel
{
    protected $table = 'demo_user';
    /** @var array $fillable */
    protected $fillable = ['id', 'name', 'account', 'password'];
}