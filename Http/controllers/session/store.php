<?php

use Http\Forms\LoginForm;
use Core\Authenticator;


$email = $_POST['email'];
$password = $_POST['password'];


/**LESSON
 * Think when you have two pieces of code that are mostly the same but slightly different…
 * Try to make them identical first. Then merge them.
 */



//We moved the try catch up a level in the public.index.php file so we 
//can dyncamically catch all route errors in one place

//Now we properly delegfate all the responsiblities to the form and authenticating

//Check if the form input is valid in first place
$form = LoginForm::validate([
    'email' => $email,
    'password' => $password,
]);



$auth = new Authenticator();
//2. Check is user exists and see it if password matches
//log in the user if password matches 
if(!$auth->attempt($email, $password)){
    $form->error('auth', 'Invalid email or password.')
    ->throw();
}

//Success
//Redirect them notice Redirect the VERB, this can help you dictate a proper function name... 
//What does it do??
redirect('/');


