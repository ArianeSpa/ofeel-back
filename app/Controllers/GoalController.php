<?php

namespace oFeel\Controllers;
use oFeel\Models\GoalModel;

class GoalController extends CoreController
{
    public function all()
    {
        $goalModel = new GoalModel();
        $goalCollection = $goalModel->findAll();
        $this->showJson($goalCollection);
    }
} 