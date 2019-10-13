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
    }
}
