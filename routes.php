<?php


// //ENDPOINTS directions to controllers 
// return [
//     '/' => 'controllers/index.php', 
//      '/about' => 'controllers/about.php',
//      '/contact' => 'controllers/contact.php',  
//      '/notes' => 'controllers/notes/index.php',
//      '/note' => 'controllers/notes/show.php',
//      '/notes/create' => 'controllers/notes/create.php'
// ];



//NEW IMPROVED ROUTER which is now a class.
// We no longer use a simple URL => controller array.
// Now we use the Router object and attach an HTTP method (GET, POST, etc)
// to each route, which gives us more control over requests.
//And remember $router is derived from public/index.html which is the base

$router->get('/', 'controllers/index.php');
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');


//RESTFUL CONVENTION if you want to make a new note
//make a post request to the notes resource
//Route to controller responsible for storing notes... note the naming conventions store
$router->post('/notes', 'controllers/notes/store.php');

//Route to controller for deleting notes note words like destroy, show, create etc. 
$router->delete('/note', 'controllers/notes/destroy.php');




