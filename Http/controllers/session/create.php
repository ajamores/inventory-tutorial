<?php

use Core\Session;




// $_SESSION = [];


view('session/create.view.php', [
    'heading' => "Log In",
    'errors' => Session::get('errors'),
]);