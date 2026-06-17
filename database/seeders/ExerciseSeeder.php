<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $exercises = [
            ['title' => 'Жим штанги лежачи', 'muscle_group' => 'Груди', 'description' => 'Базова вправа для розвитку великих грудних м\'язів та трицепсів.'],
            ['title' => 'Присідання зі штангою', 'muscle_group' => 'Ноги', 'description' => 'Основна вправа для квадрицепсів, сідниць та м\'язів кору.'],
            ['title' => 'Станова тяга', 'muscle_group' => 'Спина', 'description' => 'Складнокоординаційний рух для розвитку всієї задньої ланцюгової лінії м\'язів.'],
            ['title' => 'Армійський жим', 'muscle_group' => 'Плечі', 'description' => 'Жим штанги стоячи над головою для розвитку дельтоподібних м\'язів.'],
            ['title' => 'Підтягування', 'muscle_group' => 'Спина', 'description' => 'Вправа з власною вагою для найширших м\'язів спини та біцепсів.']
        ];

        foreach ($exercises ?? [] as $exercise) {
            Exercise::create($exercise);
        }
    }
}