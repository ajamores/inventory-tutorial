<?php

/**
 * Die and dump 
 */
function dd($value) {
    echo "Die and Dump function called";
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die(); //Used to terminate script, for debugging checking global variables like $_SERVER
}

// dd($_SERVER);

//Problem: The nav links hover based on where the users are are still hardcoded. The above function
//helps us to look up info or debug and find stuff like REQUEST_URI which indicates what page the user is on. 
//We can use that to make the nav-links hover stuff dynamic


/**
 * Check if url is  matches the current request uri
 */
function urlIs($url){

    return $_SERVER['REQUEST_URI'] === $url; 
}

function authorize($condition, $status = Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

/**
 * Provides direct path to root project folder, can 
 * be used for any file directory needs
 */
function base_path($path){
    return BASE_PATH . $path;
}

/**
 * We load views all the time, best to use function for it and have it 
 * relative to the base_path 
 */
function view($path, $attributes){

    //Extract variariables from the passed $attributes
    //eg.    view("index.view.php", [
    //          'heading' => 'Home'
    //        ]);
    //The name of the variable is the key in this instance there is now a $heading variable
    extract($attributes);
    //dd($heading); for proof 

    // dd(base_path('views/' . $path)); 
    //Process the path in sequential order 
    //inventory-tutorial/public/../views/about.view.php
    //⬇
    //inventory-tutorial/views/about.view.php
    require base_path('views/' . $path);   // eg. root/views/index.php
}

