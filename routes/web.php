<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

// Головна сторінка
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public exercises index (allow guests to view the exercises directory)
Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');

// Маршрути для гостей (Вхід / Реєстрація)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Захищені маршрути (для авторизованих атлетів)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    // Керування вправами (CRUD)
    Route::get('/exercises/create', [ExerciseController::class, 'create'])->name('exercises.create');
    Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');
    Route::get('/exercises/{exercise}/edit', [ExerciseController::class, 'edit'])->name('exercises.edit');
    Route::put('/exercises/{exercise}', [ExerciseController::class, 'update'])->name('exercises.update');
    Route::delete('/exercises/{exercise}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');

    // Журнал тренувань
    Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::get('/workouts/{workoutSession}', [WorkoutController::class, 'show'])->name('workouts.show');
    Route::post('/workouts/{workoutSession}/sets', [WorkoutController::class, 'storeSet'])->name('workouts.sets.store');
    Route::delete('/sets/{workoutSet}', [WorkoutController::class, 'destroySet'])->name('workouts.sets.destroy');
    Route::delete('/workouts/{workoutSession}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
});