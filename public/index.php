<?php

/////////////////
// POINT D'ENTREE
/////////////////

use oFeel\Application;

//--------------------------------------------------------------

// IMPORT CLASSES

// Utilisation de namespace plutôt que de faire des require
// require __DIR__.'/../app/Utils/Database.php';
// require __DIR__.'/../app/Models/CoreModel.php';
// require __DIR__.'/../app/Controllers/CoreController.php';
// require __DIR__.'/../app/Controllers/ErrorController.php';
// require __DIR__.'/../app/Application.php';

//
// Mis à dispo par altorouter pour les deps gérées par Composer
//
require __DIR__.'/../vendor/autoload.php';


//--------------------------------------------------------------

// LANCEMENT APP

$app = new Application();
$app->run();

