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
    Schema::create('workout_plans', function (Blueprint $table) {
        $table->id();
        // Прив'язка до користувача. Якщо видалити юзера — видалиться і його план
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('title'); // Назва програми (напр. "Фулбоді")
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_plans');
    }
};
