<?php

namespace oFeel\Controllers;
use oFeel\Models\UserModel;

class UserController extends CoreController
{
    public function create()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        dump($username . ' ' . $password);
        $newUser = new UserModel;
        $newUser->setUsername($username);
        $newUser->setPassword($password);
        $test = $newUser->insert();
        dump($test);
    }
} 