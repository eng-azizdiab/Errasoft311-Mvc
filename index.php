<?php
require "vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use Errasoft311\Mvc\Database\DB;
use Errasoft311\Mvc\Env\EnvDash;
use Errasoft311\Mvc\Session\SessionDash;
//$data=DB::table("category")->select()->all();
//\Errasoft311\Mvc\Cookies\CookiesDash::set("name","ali",3600,"/");
echo "<pre>";
//print_r(\Errasoft311\Mvc\Cookies\CookiesDash::get("name"));
//echo \Errasoft311\Mvc\Storage\StorageDash::type();
//\Errasoft311\Mvc\Storage\StorageDash::handle()::set("zz","ss");
//print_r($_SESSION);
$newobject=new \Errasoft311\Mvc\Storage\StorageDash();
$newobject->set("age");
print_r($_SESSION);