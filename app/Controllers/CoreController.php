<?php

namespace oFeel\Controllers;

// Classe qui ne sera jamais instanciée, uniquement héritée (abstract)
abstract class CoreController
{
    protected function show($viewName)
    {
        // header('Content-Type: text/html');

        // inclusion vues
        include __DIR__.'/../views/header.tpl.php';
        include __DIR__.'/../views/'.$viewName.'.tpl.php';
        include __DIR__.'/../views/footer.tpl.php';
    }

    protected function error404()
    {
        // indique au nav page non trouvée. Pas redirection
        header("HTTP/1.0 404 Not Found");

        // j'affiche le code html correspondant à ma vue 404
        $this->show('404');
    }

    protected function redirecToRoute($routeName, $routeVars=[])
    {
        // TODO générer $url avec altorouter

        header('Location: '.$url);
        die();
    }
    
    // Méthode qui encode en Json
    // Retourne false en cas d'erreur
    protected function showJson($data) {
        // J'autorise l'accès à la ressource depuis n'importe quel autre domaine (CORS)
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');

        // J'ajoute un en-tête qui précise que la réponse est en json
        header('Content-Type: application/json');

        // J'affiche les données JSON 
        // http://php.net/json_encode
        echo json_encode($data);
    }
}