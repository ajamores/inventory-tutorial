<?php

namespace Core\Middleware;


/**
 * Acts as the parent class for all the 
 * middlewares 
 */
class Middleware{

    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

        
    /**
     * resolve
     *
     * Looks to see if middle ware exists and if so calls its handle
     * @param  mixed $key
     * @return void
     */
    public static function resolve($key){
        
        if(!$key){
            return;
        }

        //Does the middle ware exist? 
        $middleware = static::MAP[$key] ?? false;

        if(!$middleware){
            throw new \Exception("No matching middleware found for key: '$key'.");
        }

        (new $middleware)->handle();
    }
}