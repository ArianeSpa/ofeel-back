<?php

namespace oFeel\Controllers;

use oFeel\Models\FoodModel;
use oFeel\Models\DietModel;
use oFeel\Models\GoalModel;


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

        // essai de récup des goal datas ok
        $newGoalModel = new GoalModel;
        $myGoalList = $newGoalModel->findGoal();
        dump($myGoalList);
        
        $this->show('home');
    }
}