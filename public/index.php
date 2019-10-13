<?php

// POINT D'ENTREE charge les fichiers nécessaires et démarre l'application
// use ofeel\Application;


//--------------------------------------------------------------
/////////////////
// IMPORT CLASSES
/////////////////

//
// Controllers
//
require __DIR__.'/../app/Controllers/CoreController.php';

//
// Models
//
require __DIR__.'/../app/Models/CoreModel.php';

//
// Utils
//
require __DIR__.'/../app/Utils/Database.php';

//
// Front Controller
//
require __DIR__.'/../app/Application.php';

// Mis à dispo par altorouter
require __DIR__.'/../vendor/autoload.php';


//--------------------------------------------------------------

/////////////////
// LANCEMENT APP
/////////////////

$app = new Application();
$app->run();


echo 'je suis le front controller';

