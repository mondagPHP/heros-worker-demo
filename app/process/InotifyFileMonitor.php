<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
namespace app\process;

use Workerman\Worker;

/**
 * Inotify version
 *
 * Class FileMonitor.
 */
class InotifyFileMonitor
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
        $this->paths = (array) $monitorDir;
        $this->extensions = $monitorExtensions;

        $this->monitoring();
    }

    public function monitoring()
    {
        $fd = inotify_init();

        while (true) {
            foreach ($this->paths ?? [] as $path) {
                if (! is_dir($path)) {
                    if (! is_file($path)) {
                        return;
                    }
                    $iterator = [new \SplFileInfo($path)];
                } else {
                    // recursive traversal directory
                    $dirIterator = new \RecursiveDirectoryIterator($path);
                    $iterator = new \RecursiveIteratorIterator($dirIterator);
                }

                foreach ($iterator as $file) {
                    /** var SplFileInfo $file */
                    if (is_dir($file)) {
                        inotify_add_watch($fd, $file, IN_MODIFY);
                    }
                }
            }
    
            inotify_read($fd);
    
            posix_kill(posix_getppid(), SIGUSR1);
        }
        
        fclose($fd);

        pcntl_wait($status);
    }
}
