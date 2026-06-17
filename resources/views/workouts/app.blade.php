@extends('layouts.app')

@section('title', 'Мій Щоденник')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <div>
        <h1 class="fw-bold text-white mb-1">Мій прогрес</h1>
        <p class="text-secondary mb-0">Сьогодні субота, чудовий день для нового рекорду!</p>
    </div>
    <button class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow">
        + Нове тренування
    </button>
</div>

<div class="row g-4">
    @forelse($workouts as $workout)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card pt-card-white h-100 p-3">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-dark text-white rounded-pill px-3 py-2 text-uppercase font-monospace">
                                {{ $workout->type }} </span>
                            <small class="text-muted-dark fw-medium">
                                {{ $workout->date->format('d.m.Y') }}
                            </small>
                        </div>
                        
                        <h3 class="card-title fw-bold mb-3">{{ $workout->name }}</h3>
                        
                        <ul class="list-unstyled mb-4">
                            @foreach($workout->exercises as $exercise)
                                <li class="d-flex justify-content-between align-items-center py-2 border-bottom border-light">
                                    <span class="fw-semibold">{{ $exercise->name }}</span>
                                    <span class="badge bg-secondary bg-opacity-10 text-dark rounded">
                                        {{ $exercise->sets_count }}х{{ $exercise->reps_avg }} ({{ $exercise->max_weight }} кг)
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
                        <span class="text-muted-dark small">
                             {{ $workout->duration }} хв
                        </span>
                        <a href="#" class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                            Детальніше →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-dark bg-opacity-20 rounded-4 border border-secondary border-opacity-10">
                <h3 class="text-secondary fw-semibold">Жодних тренувань не знайдено</h3>
                <p class="text-muted">Час створити свій перший запис та почати шлях до мети!</p>
            </div>
        </div>
    @endforelse
</div>
@endsection