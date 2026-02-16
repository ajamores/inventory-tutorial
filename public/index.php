<?php
/**
 * The index file in the root folder is the Router and acts as a Front end controller. 
 * It is like a traffic cop that will direct traffic to the appropriate controller that will 
 * then interact with the model which will then interact with the server to get the appropriate data.
 * 
 * UPDATE
 * It is not good to have a bunch of routing logic all dumped into this one file,
 * makes for spghetti. Instead make a router file or folder I believe there is 
 * use of multiple routers 
 * 
 * index.php is a ROUTER ENTRY POINT and loads the routes
 * 
 * index.php boots the app and loads the router — router.php actually routes.
 * 
 *
 */
session_start();

use Core\Router;

//Path to root folder
CONST BASE_PATH = __DIR__  . '/../'; //1.Current directory + go up a level


require BASE_PATH . 'Core/global-functions.php';



// require base_path('Database.php');
// require base_path('Response.php');
//VERY IMPORTANT with this we load what we require when 
//we use only. For scripts that require the Database we autoload
//it when we need it
spl_autoload_register(function ($class){
    
    //Implementing namespace Core in Database.php changes path to Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class );
 
    
    require base_path($class . '.php');
});

require base_path('bootstrap.php');

$router = new Router();
$routes = require(base_path('routes.php'));

// dd($_SERVER);
//Grab just the path  of the uri not the queries 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//Remember that html only supports POST AND GET on forms so we pass values to the post as a workaround 
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

// dd($_POST);
//Remember forms dont natively support nothing other than get and post
//
$router->route($uri, $method);




