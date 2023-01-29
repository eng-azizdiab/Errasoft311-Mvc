<?php
namespace Errasoft311\Mvc\Cookies;
use Errasoft311\Mvc\Contracts\Storage\TypeInterface;
class CookiesDash extends TypeInterface {

    public  function set(string $key, mixed $value, int $time, $path="/"): void
    {
        echo "CokiesCokies";
        setcookie($key,$value,time()+$time,$path);
    }

    public  function get(string $key): mixed
    {
        return $_COOKIE[$key];
    }

    public  function destroy($key): void
    {
       setcookie($key,"",time()-100,"/");
       unset($_COOKIE[$key]);
    }
}