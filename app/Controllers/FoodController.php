<?php

namespace oFeel\Controllers;
use oFeel\Models\FoodModel;

class FoodController extends CoreController
{
    public function all()
    {
        $foodModel = new FoodModel();
        $foodCollection = $foodModel->findFood();
        $this->showJson($foodCollection);
    }
} 