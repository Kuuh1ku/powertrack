<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutSet extends Model
{
    use HasFactory;

    // Дозволяємо масове заповнення для полів підходу
    protected $fillable = [
        'workout_session_id',
        'exercise_id',
        'reps',
        'weight',
    ];

    // Зв'язок із сесією тренування
    public function workoutSession()
    {
        return $this->belongsTo(WorkoutSession::class);
    }

    // Зв'язок із конкретною вправою
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}