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
        // essai de récup des food datas ok
        // $newFoodModel = new FoodModel;
        // $myFoodList = $newFoodModel->findFood();
        // dump($myFoodList);

        // essai de récup des diet datas ok
        // $newDietModel = new DietModel;
        // $listId=['1', '2'];
        // $myDietList = [];
        // foreach ($listId as $key => $value) {
        //     dump($value);
        //     $myDietList [] = [$newDietModel->findDiet($value)];
        // };
        // dump($myDietList);

        // essai de récup des goal datas ok
        // $newGoalModel = new GoalModel;
        // $myGoalList = $newGoalModel->findGoal();
        // dump($myGoalList);

        // essai de récup des activity datas ok
        // $newActivityModel = new ActivityModel;
        // $myActivityList = $newActivityModel->findActivity();
        // dump($myActivityList);

        // essai de récup des users datas ok
        // $newUserModel = new UserModel;
        // $newUserModel->setUsername('toto3');
        // $newUserModel->setPassword('totofou3');
        // $newUserModel->setEmail('toto3@totofou.tofu');
        // $myUserTest = $newUserModel->insert();
        // dump($myUserTest);

        $newUserModel = new UserModel;
        $newUserModel->setUsername('user4');
        $newUserModel->setPassword('user4');
        $newUserModel->setEmail('user4@totofou.tofu');
        $userInsert = $newUserModel->insert();
        dump($userInsert);
        $newUserModel->setId('10');
        $newUserModel->setGoalId('2');
        $userUpdate = $newUserModel->updateGoalAndDiet();
        dump($userUpdate);

        
        // $newUserModel->setId('8');
        // $myUserTest = $newUserModel->delete();
        // dump($myUserTest);

        
        $this->show('home');
    }
}