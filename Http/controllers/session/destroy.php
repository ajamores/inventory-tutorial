<?php

use Core\Authenticator;

//log the user out and destory the session

(new Authenticator)->logout();
redirect('/');