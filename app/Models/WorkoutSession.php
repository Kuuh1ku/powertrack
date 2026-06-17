<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutSession extends Model
{
    use HasFactory;

    // Дозволяємо масове заповнення цих полів через метод create()
    protected $fillable = [
        'user_id',
        'date',
    ];

    // Зв'язок із користувачем
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Зв'язок із підходами
    public function workoutSets()
    {
        return $this->hasMany(WorkoutSet::class);
    }
}