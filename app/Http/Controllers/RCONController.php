<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RCONController extends Controller
{
    public bool $connected = false;
    private $socket;

    public function __construct($hostname, $password, $port = 25575, $timeout = 5)
    {
        $this->socket = @fsockopen($hostname, $port, $errno, $err_str, $timeout);
        if (!$this->socket) {
            throw new \Exception("Connection failed to $hostname:$port", 0);
        }
        stream_set_timeout($this->socket, 30);
        $this->write(3, $password);
        $response = $this->read();
        if (strpos($response,'failed') > -1)
        {
            fclose($this->socket);
            throw new \Exception("Password is invalid", 1);
        }
        $this->connected = true;
    }

    public function send($command)
    {
        $this->write(2, $command);
        return $this->read();
    }

    private function write($type, $data)
    {
        $packet = pack('VV', 0x2A, $type).$data."\x00\x00";
        $packet = pack('V', strlen($packet)).$packet;
        fwrite($this->socket, $packet, strlen($packet));
    }

    private function read()
    {
        $size = fread($this->socket, 4);
        $size = unpack('V1size', $size)['size'];
        $packet = '';
        do {
            $packet = $packet.fread($this->socket, $size - strlen($packet));
        } while (strlen($packet) != $size);
        $packet = unpack('V1id/V1type/a*body', $packet)['body'];
        return substr($packet, 0, -2);
    }
}
