<?php

// use Core\Database;


// //Dedicated file for environment config 
// $config = require base_path('config.php');


// //now we can pass configs for dev or prod
// $db = new Database($config['database']);


use Core\App;

$db = App::resolve('Core\Database'); //replaces the above comments way better



//For now lets assume this user is logged in 
$currentUser = 1 ;

// dd($_GET);


$query = 'SELECT * FROM notes WHERE id = ?';

//IMPORTANT NOTE THE $_GET from the query 
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
