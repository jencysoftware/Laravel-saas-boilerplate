<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function isForTeams()
    {
        return $this->teams_enabled === 1;
    }

    public function isNotForTeams()
    {
        return !$this->isForTeams();
    }

    public function scopeActive(Builder $builder)
    {
    	return $builder->where('active', 1);
    }

    public function scopeExcept(Builder $builder, $planId)
    {
        return $builder->where('id', '!=', $planId);
    }

    public function scopeForUsers(Builder $builder)
    {
    	return $builder->where('teams_enabled', 0);
    }

    public function scopeForTeams(Builder $builder)
    {
    	return $builder->where('teams_enabled', 1);
    }
}
