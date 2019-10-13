<?php

namespace oFeel\Controllers;

use oFeel\Models\FoodModel;
use oFeel\Models\DietModel;


// Classe qui ne sera jamais instanciée, uniquement héritée (abstract)
class MainController extends CoreController
{
    public function home()
    {
        // essai de récup des food datas ok
        // $newFoodModel = new FoodModel;
        // $myFoodList = $newFoodModel->findFood();
        // dump($myFoodList);

        // essai de récup des diet datas ok
        // $newDietModel = new DietModel;
        // $myDietList = $newDietModel->findDiet();
        // dump($myDietList);
        
        $this->show('home');
    }
}