<?php

use Core\Database;


//Dedicated file for environment config 
$config = require base_path('config.php');


//now we can pass configs for dev or prod
$db = new Database($config['database']);

//For now lets assume this user is logged in 
$currentUser = 1 ;


$query = 'SELECT * FROM notes WHERE id = ?';

$note = $db->query($query, [$_GET['id']])->findOrFail(); 
authorize($note['user_id'] === $currentUser, 403);

// if($note[0]['user_id'] !== $currentUser){
//     abort(403);
// }


$body = $note['body'];


view('notes/show.view.php', [
    'heading' => 'Note ID: ' . $note['id'],
    'note' => $note,
]);
