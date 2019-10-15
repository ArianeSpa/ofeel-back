<?php

namespace oFeel\Models;

use oFeel\Utils\Database;
use PDO;

class ActivityModel extends CoreModel
{
    const TABLE_NAME = 'activity';

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

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'activity' => $this->activity_type,
            'factor' => $this->factor,
        ];
    }
}