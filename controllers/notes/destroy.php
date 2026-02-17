<?php

use Core\App;


//Using a container that contains database connection and config. That container is within the App class 
$db = App::resolve('Core\Database');


//For now lets assume this user is logged in 
$currentUser = 2 ;
  
    
$query = 'SELECT * FROM notes WHERE id = ?';

//Get the particualr note with its id
$note = $db->query($query, [$_POST['id']])->findOrFail(); 
//Check to see if the note has a user_id that matches the current user
authorize($note['user_id'] === $currentUser, 403);

//Another way to use parameterized statements
$deleteQuery = 'DELETE FROM notes where id = :id';

$db->query($deleteQuery, [
    'id' => $_POST['id'] //Remember the form input must name of id in this case
]);



//Redirect user after deletion to main notes page
header('location: /notes');
exit();

