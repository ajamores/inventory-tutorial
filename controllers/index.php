 <?php


$_SESSION['name'] = 'Armand';
    
   //global functions used to help elments become dynamic 
   // require "global-functions.php";  placed in main router index.php no need
   //Connecting data file to the view
view("index.view.php", [
   'heading' => 'Home',
]);

