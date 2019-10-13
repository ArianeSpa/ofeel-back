<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class DietModel extends CoreModel
{
    protected $diet_type;

    public function getDietType(){
        return $this->diet_type;
    }

    public function findDiet()
    {
        $sql = 'SELECT *
                FROM diet';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);
        $dietCollection = $pdoStatement->fetchAll();

        return $dietCollection;
    }
}