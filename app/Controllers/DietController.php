<?php

namespace oFeel\Controllers;
use oFeel\Models\DietModel;

class DietController extends CoreController
{
    public function all()
    {
        $dietModel = new DietModel();
        $dietCollection = $dietModel->findAll();
        $this->showJson($dietCollection);
    }
} 