<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\entity\demo;

use Carbon\Carbon;
use framework\database\HeroModel;

/**
 * Class User
 * @property int $id
 * @property string $name
 * @property string $account
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends HeroModel
{
    protected $table = 'demo_user';
    /** @var array $fillable */
    protected $fillable = [
        //Format each item with a new line
        'id',
        'name',
        'account',
        'password',
    ];
}
