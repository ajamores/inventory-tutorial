<?php



//The rotuer file will be deidcated to parsing the Uri and handling routing to controllers
//LISTEN FOR URI or endpoints 
//Check url and see if it matches any pages, map to appropriate controller


//Urls can contain querys remember in apis how you request things so we must parse
//array(2) {
//   ["path"]=>
//   string(6) "/about"
//   ["query"]=>
//   string(7) "foo=bar"
// }


/**
 * routeToController
 * 
 * list of routes in the routes file.
 * Check the current uri and see if that uri is a key 
 * within array of routes. If so direct to proper controller
 *
 * @param  mixed $uri 
 * @param  mixed $routes
 * @return void
 */
function routeToController($uri, $routes){

    if(array_key_exists($uri, $routes)){

        require base_path($routes[$uri]); // get the appropriate controller to guide 
    } else{
        abort();
    }
}


/**
 * Handle http error status codes 
 */
function abort($status = 404){
    
    http_response_code($status);
    match ($status) {
            404 => require(base_path('views/404.view.php')), 
            403 => require(base_path('views/403.view.php')),
            default => require(base_path('views/404.view.php')), //dont know yet 
        };
    
    
        die();
}


$routes = require(base_path('routes.php'));

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);

