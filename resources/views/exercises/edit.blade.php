@extends('layouts.app')

@section('title', 'Редагування вправи')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark"><h5> Редагувати вправу</h5></div>
            <div class="card-body">
                <form action="{{ route('exercises.update', $exercise->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Назва вправи</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $exercise->title) }}">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Група м'язів</label>
                        <select name="muscle_group" class="form-select">
                            @foreach(['Груди', 'Спина', 'Ноги', 'Плечі', 'Руки', 'Прес / Кор'] as $group)
                                <option value="{{ $group }}" {{ $exercise->muscle_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Опис техніки</label>
                        <textarea name="description" rows="4" class="form-control">{{ old('description', $exercise->description) }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('exercises.index') }}" class="btn btn-outline-secondary">Назад</a>
                        <button type="submit" class="btn btn-primary">Оновити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection