<?php

use Core\App;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve('Core\Database');

//Validate Form Inputs
$errors = [];
if(!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password, 7, 255)){
    $errors['password'] = 'Please provide a valid password';
}

if(!empty($errors)){
    return view('sessions/create.view.php', [
        'errors' => $errors
    ]);
}



//log in the user if password matches 
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if($user){

    if(password_verify($password, $user['password'])){
        login([
            'email' => $email,
        ]);
        
        //redirect them 
        header('location: /');
        exit();
    } 
}

//above exits script on login so need to use else just return here... if login successful it will never reach here
return view('session/create.view.php', [
    'errors' => ['email' => 'No matching account with that email or password.'],
    'heading' => 'Log In'
]);

