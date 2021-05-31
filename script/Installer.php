<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace script;

use Composer\Script\Event;

class Installer
{
    public static function install(Event $event)
    {
        $installerSet = new InstallerSet($event->getIO());
        $installerSet->setRuntimeDir();
        $installerSet->setEnv();
        $event->getIO()->write('success!!!');
    }
}

class InstallerSet
{
    public function __construct($io)
    {
        $this->io = $io;
    }

    public function setRuntimeDir()
    {
        $dir = __DIR__ . '/../runtime';
        if (! is_dir(__DIR__ . '/../runtime') && ! mkdir($dir, 0777, true) && ! is_dir($dir)) {
            $this->io->write('Directory "%s" was not created', $dir);
        }
        $this->io->write('设置 runtime目录成功');
    }

    public function setEnv()
    {
        $file = __DIR__ . '/../.env';
        $src = __DIR__ . '/../.env.example';
        if (! file_exists($file)) {
            copy($src, $file);
        }
        $this->io->write('设置 .env成功');
    }
}
