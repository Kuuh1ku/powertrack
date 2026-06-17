<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('workout_sets', function (Blueprint $table) {
        $table->id();
        // Зв'язок із сесією тренування
        $table->foreignId('workout_session_id')->constrained('workout_sessions')->onDelete('cascade');
        // Зв'язок із вправою з довідника
        $table->foreignId('exercise_id')->constrained('exercises')->onDelete('cascade');
        $table->integer('reps'); // Кількість повторень
        $table->float('weight'); // Вага снаряда в кг (float дозволяє дробові, напр. 62.5)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_sets');
    }
};
