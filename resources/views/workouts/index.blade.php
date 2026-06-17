@extends('layouts.app')

@section('title', 'Журнал тренувань | PowerTrack')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold text-dark h2 mb-1" style="letter-spacing: -0.02em;">Журнал тренувань</h1>
        <p class="text-muted small mb-0">Історія ваших занять</p>
    </div>

    <form action="{{ route('workouts.store') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary-custom">Розпочати тренування</button>
    </form>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 py-2 mb-4 small rounded-3">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        @if($sessions->isEmpty())
            <div class="card card-custom text-center p-5">
                <p class="text-muted mb-0 small">Історія тренувань порожня. Натисніть кнопку вище, щоб створити перше заняття.</p>
            </div>
        @else
            @foreach($sessions as $session)
                <div class="card card-custom mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center py-3">
                        <div>
                            <h5 class="fw-semibold text-dark mb-1" style="font-size: 1rem;">Тренування #{{ $session->id }}</h5>
                            <span class="text-muted" style="font-size: 0.85rem;">Дата: {{ \Carbon\Carbon::parse($session->date)->format('d.m.Y') }}</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('workouts.show', $session->id) }}" class="btn btn-outline-custom btn-sm px-3">
                                Переглянути / Додати підходи
                            </a>
                            
                            <form action="{{ route('workouts.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Видалити це тренування з історії?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger px-2.5">
                                    Видалити
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection