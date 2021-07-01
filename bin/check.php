<?php
/**
 * 检测函数
 */
if (!extension_loaded('pcntl')) {
    exit("Please install pcntl extension. See http://doc3.workerman.net/appendices/install-extension.html\n");
}
if (!extension_loaded('posix')) {
    exit("Please install posix extension. See https://doc3.workerman.net/appendices/install-extension.html\n");
}
$checkFuncMap = array(
    "stream_socket_server",
    "stream_socket_client",
    "pcntl_signal_dispatch",
    "pcntl_signal",
    "pcntl_alarm",
    "pcntl_fork",
    "posix_getuid",
    "posix_getpwuid",
    "posix_kill",
    "posix_setsid",
    "posix_getpid",
    "posix_getpwnam",
    "posix_getgrnam",
    "posix_getgid",
    "posix_setgid",
    "posix_initgroups",
    "posix_setuid",
    "posix_isatty",
);

// 获取php.ini中设置的禁用函数
if ($disableFuncString = ini_get("disable_functions")) {
    $disableFuncMap = array_flip(explode(",", $disableFuncString));
}
// 遍历查看是否有禁用的函数
foreach ($disableFuncMap ?? [] as $func) {
    if (isset($disableFuncMap[$func])) {
        echo "\n\033[31;40mFunction $func may be disabled. Please check disable_functions in php.ini\n";
        echo "see https://doc.workerman.net/faq/disable-function-check.html[0m\n";
        exit;
    }
}
echo "PHP Version >= 5.3.3                 \033[32;40m [OK] \033[0m\n";
echo "Extension pcntl check                \033[32;40m [OK] \033[0m\n";
echo "Extension posix check                \033[32;40m [OK] \033[0m\n";
