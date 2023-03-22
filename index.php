<?php


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once 'Config/config.php';
require_once 'vendor/autoload.php';
require_once 'Config/App.php';


use App\App\Core\Routes;
use App\App\Core\Session;

new Routes();


$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();
