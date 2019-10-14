<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class DietModel extends CoreModel
{
    protected $diet_type;

    public function getDietType()
    {
        return $this->diet_type;
    }

    public function findAll()
    {
        $sql = 'SELECT *
                FROM diet';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);
        $dietCollection = $pdoStatement->fetchAll();

        return $dietCollection;
    }

    public function findDiet($id)
    {
        $sql = 'SELECT *
                FROM diet
                WHERE id IN (:id)';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(
            ':id',
            $id,
            PDO::PARAM_INT
        );
        $pdoStatement->execute();

        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'oFeel\\Models\\DietModel');
        $dietCollection = $pdoStatement->fetch();

        return $dietCollection;
    }
}