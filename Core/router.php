<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

//The rotuer file will be deidcated to parsing the Uri and handling routing to controllers
//LISTEN FOR URI or endpoints 
//Check url and see if it matches any pages, map to appropriate controller


//Urls can contain querys remember in apis how you request things so we must parse
//array(2) {
//   ["path"]=>
//   string(6) "/abort"
//   ["query"]=>
//   string(7) "foo=bar"
// }


class Router {

    protected $routes = [];

    
    /**
     * Helps method to contruct route
     * with appropriate HTTP method and conroller.
     * Called with each http method function 
     * @param  mixed $method - HTTP request method
     * @param  mixed $uri 
     * @param  mixed $controller
     * @return void
     */
    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        //to continue chaining off this method you must return!!!!
        return $this;

    }

    public function get($uri, $controller){

        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller){

        return $this->add('POST', $uri, $controller);

    }

    public function put($uri, $controller){

        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller){

        return $this->add('PATCH', $uri, $controller);

    }

    public function delete($uri, $controller){

        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }


    /**
     * 
     */
    public function route($uri, $method){

        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){

                // Check and apply middleware (runs before controller, can block or modify request)
                // if($route['middleware'] === 'guest'){
                //     //Instansiate new guest and check if request can go through 
                //     (new Guest)->handle();
                // }
                
                // if($route['middleware'] === 'auth'){
                //     (new Auth)->handle();
                // }

                // Apply middleware if one is assigned to this route
                // Example: if middleware = 'guest', MAP returns 'Core\Middleware\Guest'
                // Then we use VARIABLE CLASS INSTANTIATION: new $middleware (creates Guest instance)
                // Parentheses wrap it so we can chain ->handle() immediately: (new Guest)->handle()
                // if($route['middleware']){
                //     $middleware = Middleware::MAP[$route['middleware']]; // Get class name string from MAP
                //     (new $middleware)->handle(); // Instantiate the class dynamically and run handle()
                // }

                //Even more simplified
                Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }
        
        //If it reaches here it cant find the controller and appropriate method
        $this->abort();
    }

    protected function abort($status = 404){

        http_response_code($status);
        match ($status) {
                404 => require(base_path('views/404.view.php')), 
                403 => require(base_path('views/403.view.php')),
                default => require(base_path('views/404.view.php')), //dont know yet 
            };
        
        
            die();
    }
}



