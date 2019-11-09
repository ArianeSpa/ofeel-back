<?php

///////////////////
// FRONT CONTROLLER
///////////////////

namespace oFeel;
use Altorouter;
use Dispatcher;


class Application
{
    private $router;
    
    public function __construct()
    {
        // Lancement d'altorouter
        $this->router = new \AltoRouter();

        // Définition de l'url de base
        // "/OFEEL/ofeel-back/public"
        $baseUri = isset($_SERVER['BASE_URI']) ? trim($_SERVER['BASE_URI']) : '';

        // Affectation à altorouter
        $this->router->setBasePath($baseUri);

        // Appel méthode remplissant liste des routes
        $this->defineRoute();
    }

    public function run()
    {
        // Altorouter tente de matcher url courante
        // Array si match, sinon false
        $match = $this->router->match();

        
        // instanciation du dispatcher, param (match, pasmatch=controller::methode)
        $dispatcher = new \Dispatcher($match, 'oFeel\Controllers\ErrorController::error404');

        $dispatcher->dispatch();
    }

    // Méthode listant les routes existantes
    private function defineRoute()
    {
        // map(type de méthode, route, controller et méthode de la classe, nom de route)
        $this->router->map(
            'GET',
             '/',
             ['controller' => 'oFeel\Controllers\MainController', 'method' => 'home'],
             'main_home'
        );
        $this->router->map(
            'GET',
             '/diets',
             ['controller' => 'oFeel\Controllers\DietController', 'method' => 'all'],
             'diets_all'
        );

        $this->router->map(
            'GET',
             '/goals',
             ['controller' => 'oFeel\Controllers\GoalController', 'method' => 'all'],
             'goals_all'
        );

        $this->router->map(
            'GET',
             '/food',
             ['controller' => 'oFeel\Controllers\FoodController', 'method' => 'all'],
             'food_all'
        );

        $this->router->map(
            'GET',
             '/activity',
             ['controller' => 'oFeel\Controllers\ActivityController', 'method' => 'all'],
             'activity_all'
        );

        $this->router->map(
            'POST',
             '/user/create',
             ['controller' => 'oFeel\Controllers\UserController', 'method' => 'create'],
             'create_user'
        );

        $this->router->map(
            'POST',
             '/user/authenticate',
             ['controller' => 'oFeel\Controllers\UserController', 'method' => 'authenticate'],
             'authenticate_user'
        );

        $this->router->map(
            'POST',
             '/user/updatemyfeeling',
             ['controller' => 'oFeel\Controllers\UserController', 'method' => 'updatemyfeeling'],
             'updatemyfeeling'
        );

        $this->router->map(
            'POST',
             '/user/updategoal',
             ['controller' => 'oFeel\Controllers\UserController', 'method' => 'updategoal'],
             'updategoal'
        );
    }
}
