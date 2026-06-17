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
    Schema::create('exercises', function (Blueprint $table) {
        $table->id();
        $table->string('title')->unique(); // Назва вправи (напр. "Жим лежачи")
        $table->string('muscle_group');   // Група м'язів (напр. "Груди")
        $table->text('description')->nullable(); // Техніка виконання
        $table->timestamps();
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
