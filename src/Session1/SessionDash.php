<?php
namespace Errasoft311\Mvc\Session;

use Errasoft311\Mvc\Contracts\Session\SessionInterface;

class SessionDash1 implements SessionInterface{

    public function __construct()
    {
        session_start();
        return new static();
    }

    public static function set(string $key, mixed $value): void
    {
        $_SESSION["$key"]=$value;
    }

    public static function get(string $key): mixed
    {
        return $_SESSION["$key"];
    }

    public static function destroy(): void
    {
        session_destroy();
    }
}