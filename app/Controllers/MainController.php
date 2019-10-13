<?php

namespace oFeel\Controllers;

use oFeel\Models\FoodModel;

// Classe qui ne sera jamais instanciée, uniquement héritée (abstract)
class MainController extends CoreController
{
    public function home()
    {
        // essai de récup des food datas ok
        // $newFoodModel = new FoodModel;
        // $myFoodList = $newFoodModel->findFood();
        // dump($myFoodList);
        
        $this->show('home');
    }
}