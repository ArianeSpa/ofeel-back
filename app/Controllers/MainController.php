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
       //TODO
    }

    
}


 
  
 
