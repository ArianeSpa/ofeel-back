<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class FoodModel extends CoreModel
{
    // On pourrait mettre private si on ne prévoit pas d'instancier la classe FoodModel
    // N'étant pas sûr de l'évolution du projet, on opte pour protected

    protected $food_name;
    protected $food_energy;
    protected $food_carbo;
    protected $food_fat;
    protected $food_prot;
    protected $food_category;

    public function getFoodName(){
        return $this->food_name;
    }

    public function getFoodEnergy()
    {
        return $this->food_energy;
    }

    public function getFoodCarbo()
    {
        return $this->food_carbo;
    }

    public function getFoodFat()
    {
        return $this->food_fat;
    }

    public function getFoodProt()
    {
        return $this->food_prot;
    }

    public function getFoodCategory()
    {
        return $this->food_category;
    }

    public function findFood()
    {
        $sql = 'SELECT 
                    food.id,
                    food.food_name,
                    food.food_energy,
                    food.food_carbo,
                    food.food_fat,
                    food.food_prot,
                    food.food_category,
                    food.created_at,
                    food.updated_at,
                    GROUP_CONCAT(`diet_type` SEPARATOR ", ") AS diet
                FROM food
                LEFT JOIN food_match_diet
                ON food.id = food_match_diet.food_id
                LEFT JOIN diet
                ON food_match_diet.diet_id = diet.id
                GROUP BY food.id';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);
        $foodCollection = $pdoStatement->fetchAll();

        return $foodCollection;
    }
}