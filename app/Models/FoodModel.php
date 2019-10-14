<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class FoodModel extends CoreModel
{
    // On pourrait mettre private si on ne prévoit pas d'instancier la classe FoodModel
    // N'étant pas sûr de l'évolution du projet, on opte pour protected
    const TABLE_NAME = 'food';

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
                    food_name,
                    food_energy,
                    food_carbo,
                    food_fat,
                    food_prot,
                    food_category,
                    GROUP_CONCAT(`diet_type` SEPARATOR ", ") AS diet
                FROM '.self::TABLE_NAME.'
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