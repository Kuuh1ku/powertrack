@extends('layouts.app')

@section('title', 'Логування тренування')

@section('content')
<div class="mb-4">
    <a href="{{ route('workouts.index') }}" class="btn btn-outline-secondary btn-sm">← Назад до журналу</a>
    <h3 class="mt-2"> Логування тренування від {{ \Carbon\Carbon::parse($workoutSession->date)->format('d.m.Y') }}</h3>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white"><h5>Записати підхід</h5></div>
            <div class="card-body">
                <form action="{{ route('workouts.sets.store', $workoutSession->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Оберіть вправу</label>
                        <select name="exercise_id" class="form-select @error('exercise_id') is-invalid @enderror">
                            <option value="" selected disabled>-- Виберіть рух --</option>
                            @foreach($exercises as $exercise)
                                <option value="{{ $exercise->id }}">{{ $exercise->title }} ({{ $exercise->muscle_group }})</option>
                            @endforeach
                        </select>
                        @error('exercise_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Вага (кг)</label>
                            <input type="number" step="0.1" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                            @error('weight') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Повторення</label>
                            <input type="number" name="reps" class="form-control @error('reps') is-invalid @enderror" value="{{ old('reps') }}">
                            @error('reps') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Додати у звіт</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white"><h5>Виконана робота</h5></div>
            <div class="card-body p-0">
                @if($workoutSession->workoutSets->isEmpty())
                    <p class="text-center p-4 text-muted my-0">Ви ще не додали жодного підходу в рамках цієї сесії.</p>
                @else
                    <table class="table table-hover table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Вправа</th>
                                <th>Група м'язів</th>
                                <th>Вага</th>
                                <th>Повторення</th>
                                <th class="text-center">Дія</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($workoutSession->workoutSets as $set)
                            <tr>
                                <td class="fw-bold">{{ $set->exercise->title }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $set->exercise->muscle_group }}</span></td>
                                <td>{{ $set->weight }} кг</td>
                                <td>{{ $set->reps }}</td>
                                <td class="text-center">
                                    <form action="{{ route('workouts.sets.destroy', $set->id) }}" method="POST" onsubmit="return confirm('Видалити цей підхід?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection