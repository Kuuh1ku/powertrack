@extends('layouts.app')

@section('title', 'Нова вправа')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white"><h5>Додати нову вправу в систему</h5></div>
            <div class="card-body">
                <form action="{{ route('exercises.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Назва вправи</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Група м'язів</label>
                        <select name="muscle_group" class="form-select @error('muscle_group') is-invalid @enderror">
                            <option value="Груди">Груди</option>
                            <option value="Спина">Спина</option>
                            <option value="Ноги">Ноги</option>
                            <option value="Плечі">Плечі</option>
                            <option value="Руки">Руки (Біцепс/Трицепс)</option>
                            <option value="Прес / Кор">Прес / Кор</option>
                        </select>
                        @error('muscle_group') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Опис техніки виконання</label>
                        <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('exercises.index') }}" class="btn btn-outline-secondary">Назад</a>
                        <button type="submit" class="btn btn-success">Зберегти вправу</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection