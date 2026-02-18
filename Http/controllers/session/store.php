<?php

use Http\Forms\LoginForm;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];


/**LESSON
 * Think when you have two pieces of code that are mostly the same but slightly different…
 * Try to make them identical first. Then merge them.
 */


//1. Form validation 
$form = new LoginForm();

//Check if the form input is valid in first place
if($form->validate($email, $password)){

    $auth = new Authenticator();
    //2. Check is user exists and see it if password matches
    //log in the user if password matches 
    if($auth->attempt($email, $password)){
        //Success
        //Redirect them notice Redirect the VERB, this can help you dictate a proper function name... 
        //What does it do??
        redirect('/');
    }

    $form->error('auth', 'Incorrect email address or password');
} 

//Failed attempt to login 
return view('session/create.view.php', [
    'errors' => $form->errors(),
    'heading' => 'Log In'
]);