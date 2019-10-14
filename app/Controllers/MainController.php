<?php

namespace oFeel\Controllers;

use oFeel\Models\FoodModel;
use oFeel\Models\DietModel;
use oFeel\Models\GoalModel;
use oFeel\Models\ActivityModel;
use oFeel\Models\UserModel;


// Classe qui ne sera jamais instanciée, uniquement héritée (abstract)
class MainController extends CoreController
{
    public function home()
    {        
        $this->show('home');
    }

    public function test()
    {
        // $newUserModel = new UserModel;
        // dump($newUserModel->findUser('1'));

        // $userModel = new UserModel();
        // dump($userModel);
        // // Je remplace ma coquille vide par une coquille pleinne !
        // $userModel = $userModel->findUser('2');
        // dump($userModel);
        // // Je change le goal
        // $userModel->setGoalId('2');
        // dump($userModel);
        // $userModel->updateGoal();

        $goalModel = new FoodModel();
        $todump = $goalModel->findFood();
        dump($todump);

        // $foodmod = new FoodModel();
        // $dump2 = $foodmod->findFood();
        // dump($dump2);
        // dump(GoalModel::TABLE_NAME);
        // dump($goalModel::TABLE_NAME);
    }
}