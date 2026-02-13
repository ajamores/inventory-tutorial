<?php

// use Core\Database;


// //Dedicated file for environment config 
// $config = require base_path('config.php');


// //now we can pass configs for dev or prod
// $db = new Database($config['database']);


use Core\App;

$db = App::resolve('Core\Database'); //replaces the above comments way better

$query = 'SELECT * FROM notes where user_id = 1';


    
$notes = $db->query($query)->getAll();




//Controllers will require a view of course
view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);