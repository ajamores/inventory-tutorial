<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

//add to the container this key with its instruction
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    
    return new Database($config['database']);
});

//Have instance of db by removing from the container that key and instruction
//and assigning it here 
// $db = $container->resolve('Core\Database');
// $dd($db); //test it out

App::setContainer($container); 