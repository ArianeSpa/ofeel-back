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
    protected $food_carb;
    protected $food_fat;
    protected $food_prot;
    protected $food_category;
    protected $food_diet;
    protected $diet;


    public function getFoodName(){
        return $this->food_name;
    }

    public function getFoodEnergy()
    {
        return $this->food_energy;
    }

    public function getFoodCarbo()
    {
        return $this->food_carb;
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

    public function getFoodDiet()
    {
        return $this->food_diet;
    }

    public function setFoodDiet($value)
    {
        $this->food_diet = $value;
    }

    public function findFood()
    {
        $sql = 'SELECT 
                    food.id,
                    food_name,
                    food_energy,
                    food_carb,
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

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'diet' => $this->diet,
            'name' => $this->food_name,
            'energy' => $this->food_energy,
            'carb' => $this->food_carb,
            'fat' => $this->food_fat,
            'prot' => $this->food_prot,
            'category' => $this->food_category,
        ];
    }
}