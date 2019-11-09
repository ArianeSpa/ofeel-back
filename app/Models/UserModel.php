<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class UserModel extends CoreModel
{
    protected $username;
    protected $email;
    protected $password;
    protected $age;
    protected $weight;
    protected $height;
    protected $gender;
    protected $basal_metabolic_rate;
    protected $energy_expenditure;
    protected $daily_calories;
    protected $breakfast_dinner_calories;
    protected $lunch_calories;
    protected $breakfast_dinner_carb_quantity;
    protected $lunch_carb_quantity;
    protected $breakfast_dinner_prot_quantity;
    protected $lunch_prot_quantity;
    protected $breakfast_dinner_fat_quantity;
    protected $lunch_fat_quantity;
    protected $activity_id;
    protected $goal_id;
    protected $diet;
    protected $activity;
    protected $factor_activity;
    protected $goal;
    protected $carb_proportion;
    protected $fat_proportion;
    protected $prot_proportion;



    //Getters and setters TODO
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($value)
    {
        $this->username = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($value)
    {
        $this->age = $value;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($value)
    {
        $this->weight = $value;
    }
    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($value)
    {
        $this->height = $value;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($value)
    {
        $this->gender = $value;
    }

    public function getBMR()
    {
        return $this->basal_metabolic_rate;
    }

    public function setBMR($value)
    {
        $this->basal_metabolic_rate = $value;
    }

    public function getNRJexp()
    {
        return $this->energy_expenditure;
    }

    public function setNRJexp($value)
    {
        $this->energy_expenditure = $value;
    }

    public function getDailyCal()
    {
        return $this->daily_calories;
    }

    public function setDailyCal($value)
    {
        $this->daily_calories = $value;
    }

    public function getBreakfastDinnerCal()
    {
        return $this->breakfast_dinner_calories;
    }

    public function setBreakfastDinnerCal($value)
    {
        $this->breakfast_dinner_calories = $value;
    }

    public function getLunchCal()
    {
        return $this->lunch_calories;
    }

    public function setLunchCal($value)
    {
        $this->lunch_calories = $value;
    }

    public function getBreakfastDinnercarbQty()
    {
        return $this->breakfast_dinner_carb_quantity;
    }

    public function setBreakfastDinnercarbQty($value)
    {
        $this->breakfast_dinner_carb_quantity = $value;
    }

    public function getLunchcarbQty()
    {
        return $this->lunch_carb_quantity;
    }

    public function setLunchcarbQty($value)
    {
        $this->lunch_carb_quantity = $value;
    }

    public function getBreakfastDinnerProtQty()
    {
        return $this->breakfast_dinner_prot_quantity;
    }

    public function setBreakfastDinnerProtQty($value)
    {
        $this->breakfast_dinner_prot_quantity = $value;
    }

    public function getLunchProtQty()
    {
        return $this->lunch_prot_quantity;
    }

    public function setLunchProtQty($value)
    {
        $this->lunch_prot_quantity = $value;
    }

    public function getBreakfastDinnerFatQty()
    {
        return $this->breakfast_dinner_fat_quantity;
    }

    public function setBreakfastDinnerFatQty($value)
    {
        $this->breakfast_dinner_fat_quantity = $value;
    }

    public function getLunchFatQty()
    {
        return $this->lunch_fat_quantity;
    }

    public function setLunchFatQty($value)
    {
        $this->lunch_fat_quantity = $value;
    }

    public function getActivityId()
    {
        return $this->activity_id;
    }

    public function setActivityId($value)
    {
        $this->activity_id = $value;
    }

    public function getActivity()
    {
        return $this->activity;
    }

    public function setActivity($value)
    {
        $this->activity = $value;
    }

    public function getGoalId()
    {
        return $this->goal_id;
    }

    public function setGoalId($value)
    {
        $this->goal_id = $value;
    }

    public function getGoal()
    {
        return $this->goal;
    }

    public function setGoal($value)
    {
        $this->goal = $value;
    }

    public function insert()
    {
        $sql = 'INSERT INTO `user`(`username`, `email`, `password`)
                VALUES(:username, :email, :userpassword);
        ';

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(
            ':username',
            $this->username,
            PDO::PARAM_STR
        );
        $pdoStatement->bindValue(
            ':email',
            $this->email,
            PDO::PARAM_STR
        );
        $pdoStatement->bindValue(
            ':userpassword',
            $this->password,
            PDO::PARAM_STR
        );
        $pdoStatement->execute();

        $affectedRows = $pdoStatement->rowCount();
        if ($affectedRows === 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function tryAuth($username)
    {
        $sql = 'SELECT
                    user.username,
                    user.password
                FROM user
                WHERE user.username = :user_to_find'; 
    
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
    
        $pdoStatement->bindValue(
            ':user_to_find',
            $username,
            PDO::PARAM_STR
        );
    
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'oFeel\\Models\\UserModel');

        return $pdoStatement->fetch();
    }

    public function catchUserInfo($username)
    {
        $sql = 'SELECT
                    user.username,
                    user.age,
                    user.weight,
                    user.height,
                    user.gender,
                    user.basal_metabolic_rate,
                    user.energy_expenditure,
                    user.daily_calories,
                    user.breakfast_dinner_calories,
                    user.lunch_calories,
                    user.breakfast_dinner_carb_quantity,
                    user.lunch_carb_quantity,
                    user.breakfast_dinner_prot_quantity,
                    user.lunch_prot_quantity,
                    user.breakfast_dinner_fat_quantity,
                    user.lunch_fat_quantity,
                    GROUP_CONCAT(`diet_type` SEPARATOR ", ") AS diet,
                    goal.goal_type AS goal,
                    goal.carbohydrate_proportion AS carb_proportion,
                    goal.protein_proportion AS prot_proportion,
                    goal.fat_proportion AS fat_proportion, 
                    activity.activity_type AS activity,
                    activity.factor AS factor_activity
                FROM user
                LEFT JOIN user_choose_diet
                ON user.id = user_choose_diet.user_id
                LEFT JOIN diet
                ON user_choose_diet.diet_id = diet.id
                LEFT JOIN goal
                ON user.goal_id = goal.id
                LEFT JOIN activity
                ON user.activity_id = activity.id
                WHERE user.username = :user_to_find
                GROUP BY user.id'; 
        
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(
            ':user_to_find',
            $username,
            PDO::PARAM_STR
        );

        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'oFeel\\Models\\UserModel');

        return $pdoStatement->fetch();
    }

    public function updatemyfeelingprofil(){
        $sql = 'UPDATE user, activity
                SET user.gender = :gender,
                    user.age = :age,
                    user.height = :height,
                    user.weight = :new_weight,
                    user.basal_metabolic_rate = :basal_metabolic_rate,
                    user.energy_expenditure = :energy_expenditure,
                    user.updated_at = CURRENT_TIMESTAMP,
                    user.activity_id = activity.id
                WHERE user.username = :username
                AND activity.activity_type = :activity;
        ';

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindValue(
            ':username',
            $this->username,
            PDO::PARAM_STR
        );

        $pdoStatement->bindValue(
            ':gender',
            $this->gender,
            PDO::PARAM_STR
        );
        
        $pdoStatement->bindValue(
            ':age',
            $this->age,
            PDO::PARAM_INT
        );
        
        $pdoStatement->bindValue(
            ':height',
            $this->height,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':new_weight',
            $this->weight,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':basal_metabolic_rate',
            $this->basal_metabolic_rate,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':energy_expenditure',
            $this->energy_expenditure,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':activity',
            $this->activity,
            PDO::PARAM_STR
        );

        $pdoStatement->execute();
        // $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'oFeel\\Models\\UserModel');

        // return $pdoStatement->fetch();
        $affectedRows = $pdoStatement->rowCount();
        if ($affectedRows === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function updategoalprofil()
    {
        $sql = 'UPDATE user, goal
                SET user.daily_calories = :daily_calories,
                    user.breakfast_dinner_calories = :breakfast_dinner_calories,
                    user.lunch_calories = :lunch_calories,
                    user.breakfast_dinner_carb_quantity = :breakfast_dinner_carb_quantity,
                    user.lunch_carb_quantity = :lunch_carb_quantity,
                    user.breakfast_dinner_prot_quantity = :breakfast_dinner_prot_quantity,
                    user.lunch_prot_quantity = :lunch_prot_quantity,
                    user.breakfast_dinner_fat_quantity = :breakfast_dinner_fat_quantity,
                    user.lunch_fat_quantity = :lunch_fat_quantity,
                    user.updated_at = CURRENT_TIMESTAMP,
                    user.goal_id = goal.id
                WHERE user.username = :username
                AND goal.goal_type = :goal;
        ';

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindValue(
            ':username',
            $this->username,
            PDO::PARAM_STR
        );

        $pdoStatement->bindValue(
            ':daily_calories',
            $this->daily_calories,
            PDO::PARAM_STR
        );
        
        $pdoStatement->bindValue(
            ':breakfast_dinner_calories',
            $this->breakfast_dinner_calories,
            PDO::PARAM_INT
        );
        
        $pdoStatement->bindValue(
            ':lunch_calories',
            $this->lunch_calories,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':breakfast_dinner_carb_quantity',
            $this->breakfast_dinner_carb_quantity,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':lunch_carb_quantity',
            $this->lunch_carb_quantity,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':breakfast_dinner_prot_quantity',
            $this->breakfast_dinner_prot_quantity,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':lunch_prot_quantity',
            $this->lunch_prot_quantity,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':breakfast_dinner_fat_quantity',
            $this->breakfast_dinner_fat_quantity,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':lunch_fat_quantity',
            $this->lunch_fat_quantity,
            PDO::PARAM_INT
        );

        $pdoStatement->bindValue(
            ':goal',
            $this->goal,
            PDO::PARAM_STR
        );

        $pdoStatement->execute();
        // $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'oFeel\\Models\\UserModel');

        // return $pdoStatement->fetch();
        $affectedRows = $pdoStatement->rowCount();
        if ($affectedRows === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM `user` WHERE id = :id';
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(
            ':id',
            $this->id,
            PDO::PARAM_INT
        );
        $pdoStatement->execute();
        $affectedRows = $pdoStatement->rowCount();
        if ($affectedRows === 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function jsonSerialize()
    {
        return [
            'username' => $this->username,
            'age' => $this->age,
            'weight' => $this->weight,
            'height' => $this->height,
            'gender' => $this->gender,
            'basal_metabolic_rate' => $this->basal_metabolic_rate,
            'energy_expenditure' => $this->energy_expenditure,
            'daily_calories' => $this->daily_calories,
            'breakfast_dinner_calories' => $this->breakfast_dinner_calories,
            'lunch_calories' => $this->lunch_calories,
            'breakfast_dinner_carb_quantity' => $this->breakfast_dinner_carb_quantity,
            'lunch_carb_quantity' => $this->lunch_carb_quantity,
            'breakfast_dinner_prot_quantity' => $this->breakfast_dinner_prot_quantity,
            'lunch_prot_quantity' => $this->lunch_prot_quantity,
            'breakfast_dinner_fat_quantity' => $this->breakfast_dinner_fat_quantity,
            'lunch_fat_quantity' => $this->lunch_fat_quantity,
            'activity' => $this->activity,
            'diet' => $this->diet,
            'goal' => $this->goal,
            'factor_activity' => $this->factor_activity,
            'carb_proportion' => $this->carb_proportion,
            'fat_proportion' => $this->fat_proportion,
            'prot_proportion' => $this->prot_proportion,
        ];
    }


}