<?php

namespace oFeel\Models;

// Classe qui ne sera jamais instanciée, uniquement héritée (abstract)
abstract class CoreModel {

    //Propriétés communes à tous les models
    protected $id;
    protected $created_at;
    protected $updated_at;

    //Getters
    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}