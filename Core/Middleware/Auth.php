<?php

namespace Core\Middleware;


class Auth{

    /**
     * handle
     * Determines whether or not the request can continue to the Core of application
     * @return void
     */
    public function handle(){
        
        if(! $_SESSION['user'] ?? false){
            header('location: /');
            exit();
        }

    }
}