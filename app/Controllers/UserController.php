<?php

namespace oFeel\Controllers;
use oFeel\Models\UserModel;

class UserController extends CoreController
{
    public function create()
    {
        $usernamePost = $_POST['username'];
        $passwordPost = $_POST['password'];
        $emailPost = $_POST['email'];
        $emptyUser = new UserModel;
        $emptyUser->setUsername($usernamePost);
        $emptyUser->setPassword($passwordPost);
        $emptyUser->setEmail($emailPost);
        $newUserToAdd = $emptyUser->insert();
        $newUserToAdd && $response = ['response' => $newUserToAdd];
        $this->showJson($response);    
    }

    public function authenticate()
    {
        $usernamePost = $_POST['username'];
        $passwordPost = $_POST['password'];

        //Je vérifie que l'utilisateur existe dans la BDD et je récupère au passage son password
        $emptyUser = new UserModel;
        $userToTest = $emptyUser->authenticate($usernamePost, $passwordPost);

        if ($userToTest) {
            $response = [
                "find" => true,
                "data" => $emptyUser->catchUserInfo($usernamePost)
            ];
        } else {
            $response = ["find" => false];
        }
        // $response = ["resp" => $emptyUser->catchUserInfo($usernamePost)];

        // dump($userToTest);

        // $newUserToAdd && $response = ['response' => $newUserToAdd];
        $this->showJson($response);    
    }
} 