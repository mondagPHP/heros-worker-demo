<?php
declare(strict_types=1);

namespace App\Process;

use Workerman\Connection\TcpConnection;

class WebSocket {

    public function onConnect(TcpConnection $con)
    {
        $con->send('hello');
    }

    public function onMessage(TcpConnection $con, $data)
    {
        var_dump($data);
        $con->send('receive data:::' . $data);
    }

}