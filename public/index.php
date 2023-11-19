<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - forum
 * Last Updated - 9/09/2023
 */

use App\Framework\Application;
use App\Framework\Facades\App;

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

//Define our root file
define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);

//Include our app boostrap autoloader
require_once ROOT . "App" . DIRECTORY_SEPARATOR . "Framework" . DIRECTORY_SEPARATOR . "autoloader.php";

//Next we get our application instance
$app = Application::getInstance();

//Next load our web and api routes
$app->loadRoutes("web.php","v1.0");

//Check if we are in debug mode, this is false
//by default.
if(App::Env("APP_DEBUG",false)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

//Set the timezone
date_default_timezone_set(App::Env("TIME_ZONE",'Australia/Melbourne'));

header("Content-Type: application/json");
//Finally we execute the request
echo json_encode($app->executeHttpRequest());