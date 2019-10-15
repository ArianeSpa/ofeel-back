<?php

namespace oFeel\Controllers;
use oFeel\Models\UserModel;

class UserController extends CoreController
{
    public function create()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        dump($username . ' ' . $password . ' ' . $email);
        $newUser = new UserModel;
        $newUser->setUsername($username);
        $newUser->setEmail($email);
        $newUser->setPassword($password);
        $test = $newUser->insert();
        dump($test);
    }
} 