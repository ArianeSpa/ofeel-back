<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;
use JsonSerializable;

// Classe qui ne sera jamais instanciée, uniquement héritée (abstract)
abstract class CoreModel implements JsonSerializable {

    //Propriétés communes à tous les models
    protected $id;
    protected $created_at;
    protected $updated_at;

    //Getters & setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function find($id)
    {
        $sql = 'SELECT *
                FROM '.static::TABLE_NAME.'
                WHERE id = :id';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(
            ':id',
            $id,
            PDO::PARAM_INT
        );

        $pdoStatement->execute();

        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);

        return $pdoStatement->fetch();
    }

    public function findAll()
    {
        $sql = 'SELECT *
                FROM '.static::TABLE_NAME;
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $pdoStatement->fetchAll();
    }
}