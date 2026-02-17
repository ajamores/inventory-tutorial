<?php

// use Core\Database;


// //Dedicated file for environment config 
// $config = require base_path('config.php');


// //now we can pass configs for dev or prod
// $db = new Database($config['database']);


use Core\App;

$db = App::resolve('Core\Database'); //replaces the above comments way better

//For now lets assume this user is logged in 
$currentUser = 2 ;

// dd($_GET);

//IMPORTANT sql paramers will make id?
if(!is_numeric($_GET['id'])){
    abort(404);
}

$query = 'SELECT * FROM notes WHERE id = ?';

//IMPORTANT NOTE THE $_GET from the query note?id=2ajksdnskjansd   will make it equal 2 and strip of the other chars
$note = $db->query($query, [$_GET['id']])->findOrFail(); 


//Check us the note belongs to the current user
authorize($note['user_id'] === $currentUser, 403);


// if($note[0]['user_id'] !== $currentUser){
//     dd($_SERVER);
//     abort(403);
// }


$body = $note['body'];


view('notes/show.view.php', [
    'heading' => 'Note ID: ' . $note['id'],
    'note' => $note,
]);
