<?php
namespace  Errasoft311\Mvc\Contracts\Env;



interface EnvInterface{



    public static function load():mixed;
    public static function env(string $key):mixed;

}