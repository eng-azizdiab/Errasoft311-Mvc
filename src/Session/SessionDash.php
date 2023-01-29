<?php
namespace Errasoft311\Mvc\Session;

use Errasoft311\Mvc\Contracts\Storage\TypeInterface;

class SessionDash extends TypeInterface{

    public function start()
    {
        session_start();
       // return new static();
    }

    public  function set(string $key, mixed $value,int $time=0,$path=""): void
    {
        $this->start();
        echo "Session set";
        $_SESSION["$key"]=$value;
    }

    public  function get(string $key): mixed
    {
        return $_SESSION["$key"];
    }

    public  function destroy($key): void
    {
        session_destroy();
    }
}