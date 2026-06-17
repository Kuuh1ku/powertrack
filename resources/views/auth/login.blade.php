@extends('layouts.app')

@section('title', 'Вхід | PowerTrack')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card card-custom p-4 mt-4">
            <div class="card-body p-0">
                <h3 class="text-center fw-bold mb-4" style="letter-spacing: -0.02em; color: var(--text-main);">Авторизація</h3>

                @if ($errors->any())
                    <div class="alert alert-danger border-0 py-2 mb-3 small rounded-2">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-muted small fw-medium">Email адреса</label>
                        <input type="email" name="email" class="form-control bg-white text-dark" id="email" value="{{ old('email') }}" style="border-color: var(--border-color);" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-muted small fw-medium">Пароль</label>
                        <input type="password" name="password" class="form-control bg-white text-dark" id="password" style="border-color: var(--border-color);" required>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label text-muted small" for="remember">Запам'ятати мене</label>
                    </div>

                    <button type="submit" class="btn btn-primary-custom w-100 py-2">Увійти</button>
                </form>
                
                <div class="text-center mt-4">
                    <span class="text-muted small">Ще немає профілю?</span> 
                    <a href="{{ route('register') }}" class="text-decoration-none small fw-medium ms-1" style="color: var(--text-main);">Створити</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection