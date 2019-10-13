<?php

// POINT D'ENTREE charge les fichiers nécessaires et démarre l'application
// use ofeel\Application;


//--------------------------------------------------------------
/////////////////
// IMPORT CLASSES
/////////////////

//
// Utils
//
require __DIR__.'/../app/Utils/Database.php';

//
// Models
//
require __DIR__.'/../app/Models/CoreModel.php';

//
// Controllers
//
require __DIR__.'/../app/Controllers/CoreController.php';
require __DIR__.'/../app/Controllers/ErrorController.php';
require __DIR__.'/../app/Controllers/MainController.php';

//
// Front Controller
//
require __DIR__.'/../app/Application.php';

//
// Mis à dispo par altorouter pour les deps gérées par Composer
//
require __DIR__.'/../vendor/autoload.php';


//--------------------------------------------------------------

/////////////////
// LANCEMENT APP
/////////////////

$app = new Application();
$app->run();


// echo 'je suis le point d'entrée;

