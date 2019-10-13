<?php

// namespace ofeel\Controllers;

// Classe qui ne sera jamais instanciée, uniquement héritée (abstract)
class MainController extends CoreController
{
    public function home()
    {
        $this->show('home');
    }
}