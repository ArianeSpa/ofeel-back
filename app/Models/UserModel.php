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
    protected $breakfast_dinner_carbo_quantity;
    protected $lunch_carbo_quantity;
    protected $breakfast_dinner_prot_quantity;
    protected $lunch_prot_quantity;
    protected $breakfast_dinner_fat_quantity;
    protected $lunch_fat_quantity;
    protected $activity_id;
    protected $goal_id;

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
        return $this->username;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getPassword()
    {
        return $this->username;
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

    public function getBreakfastDinnerCarboQty()
    {
        return $this->breakfast_dinner_carbo_quantity;
    }

    public function setBreakfastDinnerCarboQty($value)
    {
        $this->breakfast_dinner_carbo_quantity = $value;
    }

    public function getLunchCarboQty()
    {
        return $this->lunch_carbo_quantity;
    }

    public function setLunchCarboQty($value)
    {
        $this->lunch_carbo_quantity = $value;
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
        return $this->lunch_prot_quantity;
    }

    public function setLunchFatQty($value)
    {
        $this->lunch_prot_quantity = $value;
    }

    public function getActivityId()
    {
        return $this->activity_id;
    }

    public function setActivityId($value)
    {
        $this->activity_id = $value;
    }

    public function getGoalId()
    {
        return $this->goal_id;
    }

    public function setGoalId($value)
    {
        $this->goal_id = $value;
    }


    //Getters TODO

    public function findUser()
    {
        $sql = 'SELECT
                    user.id,
                    user.username,
                    user.email,
                    -- user.password,
                    user.age,
                    user.weight,
                    user.height,
                    user.gender,
                    user.basal_metabolic_rate,
                    user.energy_expenditure,
                    user.daily_calories,
                    user.breakfast_dinner_calories,
                    user.lunch_calories,
                    user.breakfast_dinner_carbo_quantity,
                    user.lunch_carbo_quantity,
                    user.breakfast_dinner_prot_quantity,
                    user.lunch_prot_quantity,
                    user.breakfast_dinner_fat_quantity,
                    user.lunch_fat_quantity,
                    GROUP_CONCAT(`diet_type` SEPARATOR ", ") AS diet,
                    goal.goal_type AS goal, 
                    activity.activity_type AS activity
                FROM user
                LEFT JOIN user_choose_diet
                ON user.id = user_choose_diet.user_id
                LEFT JOIN diet
                ON user_choose_diet.diet_id = diet.id
                LEFT JOIN goal
                ON user.goal_id = goal.id
                LEFT JOIN activity
                ON user.activity_id = activity.id
                GROUP BY user.id';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);
        $userCollection = $pdoStatement->fetchAll();

        return $userCollection;
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

    public function updateGoalAndDiet()
    {
        $sql = 'UPDATE `user`
                SET `goal_id` = :new_goal,
                    `updated_at` = CURRENT_TIMESTAMP
                WHERE `id` = :id ;
        ';

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindValue(
            ':new_goal',
            $this->goal_id,
            PDO::PARAM_INT
        );

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
}