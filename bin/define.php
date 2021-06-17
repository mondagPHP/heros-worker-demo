<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
//项目根目录
use Dotenv\Dotenv;
use framework\aop\ClassLoader;
use framework\core\Config;

define('BASE_PATH', dirname(__DIR__));
//心跳时间
const HEARTBEAT_TIME = 55;

require_once BASE_PATH . '/vendor/autoload.php';

//默认是生产环境
$env = 'prod';
$envFile = parse_ini_file(BASE_PATH . '/.env');
if (isset($envFile['env'])) {
    $env = $envFile['env'];
}
define('ENV', $env);
//加载配置文件
Dotenv::create(BASE_PATH, "env_{$env}")->load();
//加载配置文件文件
Config::load(config_path(), []);
//应用基本配置
$appConfig = \config('app');
if (isset($appConfig['default_timezone'])) {
    date_default_timezone_set($appConfig['default_timezone']);
}

//aop
ClassLoader::reload(\config('aop'));
ClassLoader::init();
