<?php

namespace oFeel\Controllers;
use oFeel\Models\UserModel;

class UserController extends CoreController
{
    public function create()
    {
        $messages = [];

        $usernamePost = $_POST['username'];
        $passwordPost = $_POST['password'];
        $emailPost = $_POST['email'];

        if (strlen($usernamePost) < 2) {
            $messages[] = [
                'type' => 'username',
                'text' => 'Le nom d\'utilisateur doit faire au moins 2 caractères.'
            ];
        }

        if (!filter_var($emailPost, FILTER_VALIDATE_EMAIL)) {
            $messages[] = [
                'type' => 'danger',
                'text' => 'L\'adresse email fournie n\'est pas valide.'
            ];
        }

        if (strlen($passwordPost) < 8) {
            $messages[] = [
                'type' => 'danger',
                'text' => 'Ce mot de passe est trop court.'
            ];
        }

        if (count($messages) == 0) {
            // Pour créer un nouvel utilisateur il faut créer un nouvel objet de la classe User
            $newUser = new UserModel;
            $newUser->setUsername($usernamePost);
            $newUser->setEmail($emailPost);
            $newUser->setPassword(password_hash($passwordPost, PASSWORD_DEFAULT));

            $addNewUser = $newUser->insert();
        }
        $this->showJson($messages);    
    }

    public function authenticate()
    {
        $usernamePost = $_POST['username'];
        $passwordPost = $_POST['password'];

        //J'instancie un nouveau UserModel
        $emptyUser = new UserModel;
        //Je tente de trouver l'utilisateur qui souhaite se connecter
        //S'il existe en BDD je récupère un objet sinon null
        $findUser = $emptyUser->tryAuth($usernamePost);
        //j'initialise le tableau de réponse que je veux envoyer
        $response = [];

        //Si instance = existe en BDD
        if ($findUser instanceof UserModel) {
            //je compare le mot de passe entré par l'utilisateur
            //avec celui présent dans la bdd que je viens de récupérer
            $testPass = password_verify($passwordPost, $findUser->getPassword());
            if ($testPass) {
                $infoToSend = $emptyUser->catchUserInfo($usernamePost);
                $response [] = [
                    'find' => true,
                    'data' => $infoToSend
                ];
            } else {
                $response [] = [
                    'find' => true,
                    'data' => 'errorpassword'
                ];
            }
        } else {
            $response [] = [
                'find' => false,
                'data' => 'usernotfound'
            ];
        }
        $this->showJson($response);    
    }

    public function updatemyfeeling(){
        $userToUpdate = new UserModel;
        $userToUpdate->setUsername($_POST['username']);
        $userToUpdate->setGender($_POST['gender']);
        $userToUpdate->setAge($_POST['age']);
        $userToUpdate->setHeight($_POST['height']);
        $userToUpdate->setWeight($_POST['weight']);
        $userToUpdate->setBMR($_POST['basal_metabolic_rate']);
        $userToUpdate->setNRJexp($_POST['energy_expenditure']);
        $userToUpdate->setActivity($_POST['activity']);

        $result = $userToUpdate->updatemyfeelingprofil();

        $message [] = [
            'response' => $result,
        ];

        $this->showJson($message);    


    }
} 


