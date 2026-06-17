@extends('layouts.app')

@section('title', 'Панель керування | PowerTrack')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="p-5 mb-4 bg-dark text-white rounded-3 shadow-sm">
            <div class="container-fluid py-2">
                <h1 class="display-5 fw-bold">Вітаємо у клубі, {{ Auth::user()->name }}! </h1>
                <p class="">Твій статус у системі: <span class="badge bg-warning text-white">{{ strtoupper(Auth::user()->role) }}</span></p>
                <p class="">Сьогодні чудовий день, щоб стати сильнішим. Обирай дію нижче та починай роботу.</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title fw-bold mb-3"> Мій журнал тренувань</h4>
                <p class="card-text text-muted flex-grow-1">Тут ти можеш створювати нові тренувальні сесії, фіксувати підходи, робочу вагу та кількість повторень у реальному часі.</p>
                <a href="{{ route('workouts.index') }}" class="btn btn-primary mt-3 py-2 fw-bold">Відкрити журнал</a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body d-flex flex-column">
                <h4 class="card-title fw-bold mb-3"> База вправ</h4>
                <p class="card-text text-muted flex-grow-1">Список усіх доступних рухів з описом техніки.
                    @if(Auth::user()->role === 'admin')
                        <span class="text-success fw-bold">Тобі доступне повне керування (CRUD): додавання, редагування та видалення вправ.</span>
                    @else
                        Тобі доступний режим перегляду для вибору рухів під час тренування.
                    @endif
                </p>
                <a href="{{ route('exercises.index') }}" class="btn btn-outline-dark mt-3 py-2 fw-bold">Переглянути вправи</a>
            </div>
        </div>
    </div>
</div>
@endsection