<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class ActivityModel
{
    protected $activity_type;
    protected $factor;

    public function getActivityType()
    {
        return $this->activity_type;
    }

    public function getFactor()
    {
        return $this->factor;
    }

    public function findActivity()
    {
        $sql = 'SELECT *
                FROM activity';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);
        $activityCollection = $pdoStatement->fetchAll();

        return $activityCollection;
    }
}