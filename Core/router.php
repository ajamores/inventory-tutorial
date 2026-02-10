<?php

namespace Core;

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
            'method' => $method
        ];

    }

    public function get($uri, $controller){

        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller){

        $this->add('POST', $uri, $controller);

    }

    public function put($uri, $controller){

        $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller){

        $this->add('PATCH', $uri, $controller);

    }

    public function delete($uri, $controller){

        $this->add('DELETE', $uri, $controller);
    }


    /**
     * 
     */
    public function route($uri, $method){

        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                return require base_path($route['controller']);
            }
        }
        
        //If it reaches here it cant find the controller and appropriate method
        $this->about();


    }

    protected function about($status = 404){

        http_response_code($status);
        match ($status) {
                404 => require(base_path('views/404.view.php')), 
                403 => require(base_path('views/403.view.php')),
                default => require(base_path('views/404.view.php')), //dont know yet 
            };
        
        
            die();
    }
}



