<?php
/**
 * The index file in the root folder is the Router and acts as a Front end controller. 
 * It is like a traffic cop that will direct traffic to the appropriate controller that will 
 * then interact with the model which will then interact with the server to get the appropriate data.
 * 
 * UPDATE
 * It is not good to have a bunch of routing logic all dumped into this one file,
 * makes for spghetti. Instead make a router file or folder I believe there is 
 * use of multiple routers 
 * 
 * index.php is a ROUTER ENTRY POINT and loads the routes
 * 
 * index.php boots the app and loads the router — router.php actually routes.
 * 
 *
 */



//stop what yuour doing, grab these files and paste it into the code before running
require 'global-functions.php';

//index.php needs db now we made a class for it
require 'Database.php';

require 'Response.php';
require 'router.php';



