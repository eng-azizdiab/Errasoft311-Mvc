<?php
namespace Errasoft311\Mvc\Storage;

use Errasoft311\Mvc\Contracts\Storage\StorageInterface;
use Errasoft311\Mvc\Contracts\Storage\TypeInterface;
use Errasoft311\Mvc\Cookies\CookiesDash;
use Errasoft311\Mvc\Env\EnvDash;
use Errasoft311\Mvc\Session\SessionDash;
use http\Env;

class StorageDash extends TypeInterface implements StorageInterface {
 //   public static $object= self::handle();
    public  function type(){
       return EnvDash::env("STORAGE_DRIVER");
    }

    public  function set(string $key, mixed $value, int $time, $path): void
    {
        $type="Errasoft311\Mvc\\".$this->type()."\\".$this->type()."Dash";
        $type=new $type();
        $type->set($key,$value,$time,$path);
     }
    public  function handle():object{
        switch (self::type()){
            case "cookies":
                return new CookiesDash();
                break;
            case "session":
                return new SessionDash();
                break;
        }
    }
    public  function get(string $key): mixed
    {
        return "";
    }

    public  function destroy($key): void
    {
        // TODO: Implement destroy() method.
    }
}