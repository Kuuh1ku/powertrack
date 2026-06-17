@extends('layouts.app')

@section('title', 'Довідник вправ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2> Довідник вправ</h2>
    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('exercises.create') }}" class="btn btn-primary">+ Додати вправу</a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-striped mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Назва вправи</th>
                    <th>Група м'язів</th>
                    <th>Опис техніки</th>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <th class="text-center">Дії</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($exercises as $exercise)
                <tr>
                    <td class="fw-bold">{{ $exercise->title }}</td>
                    <td><span class="badge bg-secondary">{{ $exercise->muscle_group }}</span></td>
                    <td>{{ $exercise->description ?? 'Опис відсутній.' }}</td>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <td class="text-center">
                            <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-sm btn-warning me-1">Редагувати</a>
                            <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Видалити цю вправу?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection