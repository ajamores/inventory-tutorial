<?php

require 'Validator.php';

//Dedicated file for environment config 
$config = require 'config.php';

//now we can pass configs for dev or prod
$db = new Database($config['database']);


$heading = 'Create a Note';


//Check to see if user submitted a new note 
//REMEMBER TRUST NO USER INPUT EVER, SANATIZE 
//and
//place Escape functions in view, htmlspecialchars what you output
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Store validation errors
    $errors = [];
    
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
require 'views/notes/create.view.php';
