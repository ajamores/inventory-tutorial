<?php

use Core\App;
use Core\Validator;

$db = App::resolve('Core\Database');

$currentuserid = 1;

$errors = [];

//Find corresponding note
$id = $_POST['id'];
$note = $db->query("SELECT * FROM notes WHERE id = ?", [$id])->findOrFail();


//Authorize that current use can edit note
authorize($note['user_id'] === $currentuserid, 403);

//validate the form 
//give feedback if error

//Serverside validation of note body
$input = $_POST['body'];

//give 1 char min and 1000 max length 
if(!Validator::string($input, 1, 1000)){
    $errors['body'] = 'A body of no more than 1,000 characters is required'; 
}


//if not validation error update note 
if(count($errors)){
    return view('notes/edit.view.php', [
        'errors' => $errors,
        'heading' => 'Edit ',
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

//Redirect user
header('location: /notes');
die();



