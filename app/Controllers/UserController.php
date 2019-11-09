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

    public function updategoal(){
        $userToUpdate = new UserModel;
        $userToUpdate->setUsername($_POST['username']);
        $userToUpdate->setDailyCal($_POST['daily_calories']);
        $userToUpdate->setBreakfastDinnerCal($_POST['breakfast_dinner_calories']);
        $userToUpdate->setLunchCal($_POST['lunch_calories']);
        $userToUpdate->setBreakfastDinnercarbQty($_POST['breakfast_dinner_carb_quantity']);
        $userToUpdate->setLunchcarbQty($_POST['lunch_carb_quantity']);
        $userToUpdate->setBreakfastDinnerProtQty($_POST['breakfast_dinner_prot_quantity']);
        $userToUpdate->setLunchProtQty($_POST['lunch_prot_quantity']);
        $userToUpdate->setBreakfastDinnerFatQty($_POST['breakfast_dinner_fat_quantity']);
        $userToUpdate->setLunchFatQty($_POST['lunch_fat_quantity']);
        $userToUpdate->setGoal($_POST['goal']);
        // $userToUpdate->setLactoseFree($_POST['lactose_free']);
        // $userToUpdate->setVegan($_POST['vegan']);




        $resultgoal = $userToUpdate->updategoalprofil();
        $resultreset = $userToUpdate->resetDietProfil();

   
        if ($_POST['lactose_free'] !== "0"){
            $userToUpdate->setDiet($_POST['lactose_free']);
            $testL = $userToUpdate->updateDietProfil();

        } else {
            $testL ='false';
        }
        if ($_POST['gluten_free'] !== "0"){
            $userToUpdate->setDiet($_POST['gluten_free']);

            $testG = $userToUpdate->updateDietProfil();

        } else {
            $testG ='false';
        }
        if ($_POST['vegan'] !== "0"){
            $userToUpdate->setDiet($_POST['vegan']);

            $testV = $userToUpdate->updateDietProfil();

        } else {
            $testV ='false';
        }

        $message [] = [
            'goal' => $resultgoal,  
            'reset' => $resultreset,
            'lactosefree' => $testL,
            'glutenfree' => $testG,
            'vegan' => $testV,
        ];

        $this->showJson($message);    


    }
} 


