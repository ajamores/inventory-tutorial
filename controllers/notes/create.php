<?php

use Core\Database;
use Core\Validator;


$config = require base_path('config.php');

//now we can pass configs for dev or prod
$db = new Database($config['database']);

//Store validation errors
$errors = [];

//Check to see if user submitted a new note 
//REMEMBER TRUST NO USER INPUT EVER, SANATIZE 
//and
//place Escape functions in view, htmlspecialchars what you output
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    
    //Serverside validation of note body
    $input = $_POST['body'];

    //give 1 char min and 1000 max length 
    if(!Validator::string($input, 1, 1000)){
        $errors['body'] = 'A body of no more than 1,000 characters is required'; 
    }



    //If no validation errors safe to proceed 
    if(empty($errors)){
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)' , [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

//Controllers will require a view of course
view('notes/create.view.php', [
    'heading' => 'Create a Note',
    'errors' => $errors
]);
