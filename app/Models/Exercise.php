<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['title', 'muscle_group', 'description'];

    public function workoutSets()
    {
        return $this->hasMany(WorkoutSet::class);
    }
}
