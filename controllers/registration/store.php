<?php

use Core\App;
use Core\Validator;


$email = $_POST['email'];
$password = $_POST['password'];


//Validate Form Inputs
$errors = [];
if(!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password, 7, 255)){
    $errors['password'] = 'Password must be between 7 and 255 characters';
}



if(!empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors,
        'heading' => 'Register'
    ]);
}


//Check if email already exists... must be unique
$db = App::resolve('Core\Database');

    //If yes, redirect to a login page
$result = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email,
])->find();



if($result){
    $errors['email'] = 'Email already exists';
    return view('registration/create.view.php', [
        'errors' => $errors,
        'heading' => 'Register'
    ]);
}else{
    $db->query('INSERT INTO users (first_name, last_name, email, password)  VALUES (:first_name, :last_name, :email, :password)', [
        'first_name' => 'Testing',
        'last_name' => 'User',
        'email' => $email,
        'password' => $password
    ]);

    //Start session that user has logged in
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();  //Good practice to kill the script  after redirect, exit to ensure no scenrio where th script continues being ran without the header
}








    //If not, store accont into database, log user in, redirect 



