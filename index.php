<?php

session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



require_once 'vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();

require_once 'Config/config.php';
require_once 'Config/App.php';


use App\App\Core\Routes;


new Routes();
