<?php

namespace oFeel\Models;

class DietModel extends CoreModel
{
    const TABLE_NAME = 'diet';
    
    protected $diet_type;

    public function getDietType()
    {
        return $this->diet_type;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'diet_type' => $this->diet_type,
        ];
    }

}