<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\command;

use framework\command\AbstractCommand;
use framework\command\Input;

/**
 * Class TestCommand
 * @package app\command
 */
class TestCommand extends AbstractCommand
{
    protected $name = 'test';

    protected $description = '';

    // php artisan test
    public function run(Input $input = null): void
    {
        //doSomething
        echo 'test command ok' . PHP_EOL;
    }

    public function optionDefinition(): array
    {
        //[['-option', 'desc'], ['-option', 'require', 'desc'] ... ]
        return [];
    }
}
