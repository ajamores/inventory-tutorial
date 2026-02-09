<?php


//Dedicated file for environment config 
$config = require 'config.php';


//now we can pass configs for dev or prod
$db = new Database($config['database']);

$query = 'SELECT * FROM notes where user_id = 1';


    
$notes = $db->query($query)->getAll();


$heading = " My Notes";

require 'views/notes/index.view.php';