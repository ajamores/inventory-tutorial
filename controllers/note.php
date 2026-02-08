<?php


//Dedicated file for environment config 
$config = require 'config.php';


//now we can pass configs for dev or prod
$db = new Database($config['database']);

$currentUser = 1;


$id = $_GET['id'];

$query = 'SELECT * FROM notes WHERE id = ?';


    
$note = $db->query($query, [$id])->findOrFail(); 

authorize($note['user_id'] === $currentUser, 403);

// if($note[0]['user_id'] !== $currentUser){
//     abort(403);
// }

$heading = "Note ID: $id";
$body = $note['body'];



require 'views/note.view.php';