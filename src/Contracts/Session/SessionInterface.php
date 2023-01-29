<?php
namespace Errasoft311\Mvc\Contracts\Session;
interface SessionInterface{

    public static function set(string $key,mixed $value):void;
    public static function get(string $key):mixed;
    public static function destroy():void;


}