<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Dotenv\Dotenv;

require_once '../vendor/autoload.php';
require_once '../config/bootstrap.php';
$dotenv = Dotenv::create(__DIR__ . "/../");
$dotenv->load();


require_once '../routes/web.php';



