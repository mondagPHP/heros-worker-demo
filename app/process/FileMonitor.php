<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\process;

use Workerman\Lib\Timer;
use Workerman\Worker;

/**
 * Class FileMonitor.
 */
class FileMonitor
{
    /**
     * @var array
     */
    protected $paths = [];

    /**
     * @var array
     */
    protected $extensions = [];

    /**
     * FileMonitor constructor.
     * @param $monitorDir
     * @param $monitorExtensions
     */
    public function __construct($monitorDir, $monitorExtensions)
    {
        if (Worker::$daemonize) {
            return;
        }
        $this->paths = (array)$monitorDir;
        $this->extensions = $monitorExtensions;
        Timer::add(5, function () {
            foreach ($this->paths ?? [] as $path) {
                $this->checkFilesChange($path);
            }
        });
    }

    /**
     * @param $monitorDir
     */
    public function checkFilesChange($monitorDir): void
    {
        static $lastMtime;
        if (! $lastMtime) {
            $lastMtime = time();
        }
        clearstatcache();
        if (! is_dir($monitorDir)) {
            if (! is_file($monitorDir)) {
                return;
            }
            $iterator = [new \SplFileInfo($monitorDir)];
        } else {
            // recursive traversal directory
            $dirIterator = new \RecursiveDirectoryIterator($monitorDir);
            $iterator = new \RecursiveIteratorIterator($dirIterator);
        }
        foreach ($iterator as $file) {
            /** var SplFileInfo $file */
            if (is_dir($file)) {
                continue;
            }
            // check mtime
            if ($lastMtime < $file->getMTime() && in_array($file->getExtension(), $this->extensions, true)) {
                $var = 0;
                exec(PHP_BINDIR . '/php -l ' . $file, $out, $var);
                if ($var) {
                    $lastMtime = $file->getMTime();
                    continue;
                }
                print_ok($file . ' update and reload');
                posix_kill(posix_getppid(), SIGUSR1);
                $lastMtime = $file->getMTime();
                break;
            }
        }
    }
}
