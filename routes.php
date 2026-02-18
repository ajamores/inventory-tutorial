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

//NOTE THE NAMING CONVENTIONS USED FOR EACH CONTROLLER TYPE ... store, show, destroy

$router->get('/', 'index.php');
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php');
$router->get('/note/edit', 'notes/edit.php');


//RESTFUL CONVENTION if you want to make a new note
//make a post request to the notes resource
//Route to controller responsible for storing notes... note the naming conventions store
$router->post('/notes', 'notes/store.php');

//Route to controller for deleting notes note words like destroy, show, create etc. 
$router->delete('/note', 'notes/destroy.php');

//Update Note
$router->patch('/note', 'notes/update.php');


//Register Routes.... how can we make certain pages 
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

//Login Routes .... /sessions can be like alias for login.. really up to you 
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');



