<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    // READ (Перегляд усіх вправ) — доступно всім авторизованим
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    // Сторінка створення (Тільки для Admin)
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Доступ заборонено. Ви не адміністратор.');
        }
        return view('exercises.create');
    }

    // CREATE (Збереження нової вправи + Валідація) — Тільки для Admin
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:exercises,title',
            'muscle_group' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Exercise::create($validated);

        return redirect()->route('exercises.index')->with('success', 'Вправу успішно додано!');
    }

    // Сторінка редагування — Тільки для Admin
    public function edit(Exercise $exercise)
    {
        if (Auth::user()->role !== 'admin') abort(403);
        return view('exercises.edit', compact('exercise'));
    }

    // UPDATE (Оновлення даних + Валідація) — Тільки для Admin
    public function update(Request $request, Exercise $exercise)
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:exercises,title,' . $exercise->id,
            'muscle_group' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $exercise->update($validated);

        return redirect()->route('exercises.index')->with('success', 'Вправу успішно оновлено!');
    }

    // DELETE (Видалення вправи) — Тільки для Admin
    public function destroy(Exercise $exercise)
    {
        if (Auth::user()->role !== 'admin') abort(403);
        
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Вправу видалено.');
    }
}