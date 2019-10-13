<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class GoalModel extends CoreModel
{
    protected $goal_type;
    protected $carbohydrate_proportion;
    protected $protein_proportion;
    protected $fat_proportion;

    public function getGoalType()
    {
        return $this->goal_type;
    }

    public function getCarboProp()
    {
        return $this->carbohydrate_proportion;
    }

    public function getProtProp()
    {
        return $this->protein_proportion;
    }

    public function getFatProp()
    {
        return $this->fat_proportion;
    }

    public function findGoal()
    {
        $sql = 'SELECT *
                FROM goal';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);
        $goalCollection = $pdoStatement->fetchAll();

        return $goalCollection;
    }
}