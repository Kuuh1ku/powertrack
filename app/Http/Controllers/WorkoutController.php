<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSession;
use App\Models\WorkoutSet;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $sessions = $user->workoutSessions()->orderBy('date', 'desc')->get();
        return view('workouts.index', compact('sessions'));
    }

    public function store(Request $request)
    {
        $session = WorkoutSession::create([
            'user_id' => Auth::id(),
            'date' => now()->format('Y-m-d'),
        ]);

        return redirect()->route('workouts.show', $session->id)->with('success', 'Тренування розпочато!');
    }

    public function show(WorkoutSession $workoutSession)
    {
        if ($workoutSession->user_id !== Auth::id()) {
            abort(403, 'Доступ заборонено.');
        }

        $exercises = Exercise::all();
        $workoutSession->load('workoutSets.exercise');

        return view('workouts.show', compact('workoutSession', 'exercises'));
    }

    public function storeSet(Request $request, WorkoutSession $workoutSession)
    {
        if ($workoutSession->user_id !== Auth::id()) abort(403);

        $validated = $request->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'reps' => 'required|integer|min:1|max:100',
            'weight' => 'required|numeric|min:0',
        ]);

        $workoutSession->workoutSets()->create($validated);

        return back()->with('success', 'Підхід успішно зараховано!');
    }

    public function destroySet(WorkoutSet $workoutSet)
    {
        if ($workoutSet->workoutSession->user_id !== Auth::id()) abort(403);
        
        $workoutSet->delete();
        return back()->with('success', 'Підхід видалено.');
    }

    public function destroy(WorkoutSession $workoutSession)
    {
        if ($workoutSession->user_id !== Auth::id()) abort(403);
        
        $workoutSession->delete();
        return redirect()->route('workouts.index')->with('success', 'Тренування видалено з історії.');
    }
}