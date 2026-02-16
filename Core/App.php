<?php

namespace Core;

class App{

    //Makes the container singleton available anywhere in application
    protected static $container;

    public static function setContainer($container){
        
        static::$container = $container;
    }

    public static function container(){
        
        return static::$container;
    }

    //Wrapping the Container bind within this App class so that it can do that in the background 
    public static function bind($key, $instruction){
        static::container()->bind($key, $instruction);
    }

    public static function resolve($key){
        return static::container()->resolve($key);
    }

   
}