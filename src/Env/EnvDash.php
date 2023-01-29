<?php

namespace Errasoft311\Mvc\Env;
require "vendor/autoload.php";
use Errasoft311\Mvc\Contracts\Env\EnvInterface;

class EnvDash implements EnvInterface{

    public static function load(): mixed
    {
        if (file_exists("env.json")){
            $JsonContent=file_get_contents("env.json");
            return json_decode($JsonContent,true);
        }else{
            echo "file not exist";

            return null;
        }
    }

    public static function env($key): mixed
    {
        $content=self::load();
        if (array_key_exists($key,$content)){
            return $content[$key];
        }
        return "key not exists";
    }
}