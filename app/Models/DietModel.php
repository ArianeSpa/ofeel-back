<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class DietModel extends CoreModel
{
    const TABLE_NAME = 'diet';
    
    protected $diet_type;

    public function getDietType()
    {
        return $this->diet_type;
    }

}