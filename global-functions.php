<?php

    /**
     * Die and dump 
     */
    function dd($value) {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die(); //Used to terminate script, for debugging checking global variables like $_SERVER
    }

    // dd($_SERVER);

    //Problem: The nav links hover based on where the users are are still hardcoded. The above function
    //helps us to get the REQUEST_URI which indicates what page the user is on. 
    //We can use that to make the nav-links hover stuff dynamic


    /**
     * Check if url is  matches the current request uri
     */
    function urlIs($url){
        return $_SERVER['REQUEST_URI'] === $url; 
    }
