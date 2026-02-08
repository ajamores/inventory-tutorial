<?php

//The rotuer file will be deidcated to parsing the Uri and handling routing to controllers



//Urls can contain querys remember in apis how you request things so we must parse
//array(2) {
//   ["path"]=>
//   string(6) "/about"
//   ["query"]=>
//   string(7) "foo=bar"
// }

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//USE to debug
// dd($uri); 

//LISTEN FOR URI or endpoints 
//Check url and see if it matches any pages, map to appropriate controller
match ($uri) {
     '/' => require('controllers/index.php'), 
     '/about' => require('controllers/about.php'),
     '/contact' => require('controllers/contact.php'),  
     '/notes' => require('controllers/notes.php'),
     '/note' =>require('controllers/note.php'),
     default => abort(),
};


/**
 * Handle http error status codes 
 */
function abort($status = 404){
    

    http_response_code($status);
    match ($status) {
            404 => require('views/404.view.php'), 
            403 => require('views/403.view.php'),
            default => require('views/404.view.php'),  //dont know yet 
        };
    
    
        die();
}

