@extends('layouts.app')

@section('title', 'PowerTrack — Твій тренувальний щоденник')

@section('content')
<div class="row align-items-center justify-content-center text-center py-5 my-md-5">
    <div class="col-lg-8">
        <h1 class="display-3 fw-black text-dark mb-3" style="font-weight: 800; letter-spacing: -0.04em; color: #0f172a !important;">
            Прогрес любить точність
        </h1>
        <p class="lead fs-5 mb-5 mx-auto" style="max-width: 600px; color: #475569; font-weight: 400;">
            Мінімалістичний щоденник для фіксації силових показників. Залиште паперові блокноти в минулому — записуйте кожен робочий підхід миттєво.
        </p>
        
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary-custom btn-lg">Відкрити особистий кабінет</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary-custom btn-lg">Почати роботу</a>
                <a href="{{ route('register') }}" class="btn btn-outline-custom btn-lg">Створити акаунт</a>
            @endauth
        </div>
    </div>
</div>

<div class="row g-4 mt-5 pt-4 justify-content-center" style="border-top: 1px solid #e2e8f0;">
    <div class="col-md-5">
        <div class="px-3">
            <h6 class="fw-bold text-dark mb-1" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; color: #334155 !important;">
             
            </h6>
            <p class="small text-muted mb-0" style="font-size: 0.85rem; line-height: 1.5;">
            
            </p>
        </div>
    </div>
    <div class="col-md-5">
        <div class="px-3">
            <h6 class="fw-bold text-dark mb-1" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; color: #334155 !important;">
             
            </h6>
            <p class="small text-muted mb-0" style="font-size: 0.85rem; line-height: 1.5;">
               
            </p>
        </div>
    </div>
</div>
@endsection