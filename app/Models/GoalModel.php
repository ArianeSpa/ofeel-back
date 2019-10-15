<?php

namespace oFeel\Models;

class GoalModel extends CoreModel
{
    const TABLE_NAME = 'goal';
    
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

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'goal_type' => $this->goal_type,
            'carbohydrate_proportion' => $this->carbohydrate_proportion,
            'protein_proportion' => $this->protein_proportion,
            'fat_proportion' => $this->fat_proportion,
        ];
    }
}