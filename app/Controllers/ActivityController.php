<?php

namespace oFeel\Controllers;
use oFeel\Models\ActivityModel;

class ActivityController extends CoreController
{
    public function all()
    {
        $activityModel = new ActivityModel();
        $activityCollection = $activityModel->findAll();
        $this->showJson($activityCollection);
    }
} 
//test