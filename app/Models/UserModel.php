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
}