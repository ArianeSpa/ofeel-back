<?php

// namespace ofeel\Controllers;

class ErrorController extends CoreController
{
    public function error404()
    {
        // Appel de la méthode codée dans Corecontroller
        // error_log('Tiens une erreur 404 direct !');
        parent::error404();
    }
}