@extends('layouts.app')

@section('title', __('Головна'))

@section('content')
<section class="hero text-center">
    <div class="container">
        <p class="text-gold text-uppercase fw-semibold mb-2" style="letter-spacing: .08em;">{{ __('Richter Junior Competition 2027') }}</p>
        <h1 class="display-4 fw-bold">{{ __('Твій талант') }} <span class="text-gold">{{ __('має прозвучати') }}</span></h1>
        <p class="lead mt-3 mb-2">{{ __('Всеукраїнський конкурс юних музикантів віком 10–13 років') }}</p>
        <p class="fs-5">
            {{ __('Фортепіано') }}
            <span class="text-gold mx-2">•</span>{{ __('Скрипка') }}
            <span class="text-gold mx-2">•</span>{{ __('Віолончель') }}
            <span class="text-gold mx-2">•</span>{{ __('Флейта') }}
        </p>

        <div class="row justify-content-center g-3 mt-2 text-start">
            <div class="col-sm-6 col-lg-4">
                <div class="d-flex align-items-start text-white-50">
                    <i class="bi bi-calendar-event text-gold fs-5 me-2 mt-1"></i>
                    <span>{{ __('25 січня – 5 лютого 2027') }}<br><small>{{ __('онлайн-тур') }}</small></span>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="d-flex align-items-start text-white-50">
                    <i class="bi bi-mic text-gold fs-5 me-2 mt-1"></i>
                    <span>{{ __('26 лютого 2027') }}<br><small>{{ __('очний конкурсний відбір') }}</small></span>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="d-flex align-items-start text-white-50">
                    <i class="bi bi-trophy text-gold fs-5 me-2 mt-1"></i>
                    <span>{{ __('27 лютого 2027') }}<br><small>{{ __('нагородження та гала-концерт') }}</small></span>
                </div>
            </div>
        </div>

        <p class="mt-4 mb-0 text-white-50">
            <i class="bi bi-geo-alt text-gold me-1"></i>{{ __('Житомир — батьківщина Святослава Ріхтера') }}
        </p>

        <a href="{{ route('apply') }}" class="btn btn-gold btn-lg mt-4">{{ __('Подати заявку') }}</a>
        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg mt-4 ms-2">{{ __('Дізнатися більше') }}</a>
    </div>
</section>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 text-center">
            <h2 class="h3 section-title">{{ __('Коротко про конкурс') }}</h2>
            <p class="lead">{{ __('Richter Junior Competition — можливість заявити про себе на всеукраїнському рівні, пройти професійний конкурсний відбір, отримати оцінку міжнародного журі та виступити у фінальному гала-концерті на батьківщині Святослава Ріхтера.') }}</p>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <h2 class="h3 section-title">{{ __('Як відбувається конкурс') }}</h2>
        <div class="row text-center g-4">
            <div class="col-md-4">
                <span class="icon-feature"><i class="bi bi-file-earmark-text"></i></span>
                <h3 class="h5 mt-3">{{ __('Перший крок') }}</h3>
                <p class="text-muted">{{ __('З 25 січня до 5 лютого учасник заповнює електронну заявку та подає посилання на відеозапис конкурсної програми.') }}</p>
            </div>
            <div class="col-md-4">
                <span class="icon-feature"><i class="bi bi-people"></i></span>
                <h3 class="h5 mt-3">{{ __('Другий крок') }}</h3>
                <p class="text-muted">{{ __('Професійне журі оцінює відеозаписи та визначає учасників очного конкурсного відбору.') }}</p>
            </div>
            <div class="col-md-4">
                <span class="icon-feature"><i class="bi bi-mic"></i></span>
                <h3 class="h5 mt-3">{{ __('Третій крок') }}</h3>
                <p class="text-muted">{{ __('26 лютого фіналісти виступають у Житомирі, а 27 лютого відбуваються нагородження та гала-концерт.') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <h2 class="h3 section-title">{{ __('Чому варто взяти участь') }}</h2>
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="d-flex">
                <i class="bi bi-award text-primary fs-3 me-3"></i>
                <p class="mb-0">{{ __('Професійне й неупереджене оцінювання українського та міжнародного журі.') }}</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="d-flex">
                <i class="bi bi-mortarboard text-primary fs-3 me-3"></i>
                <p class="mb-0">{{ __('Досвід підготовки цілісної конкурсної програми.') }}</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="d-flex">
                <i class="bi bi-megaphone text-primary fs-3 me-3"></i>
                <p class="mb-0">{{ __('Можливість заявити про себе на всеукраїнському рівні.') }}</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="d-flex">
                <i class="bi bi-people text-primary fs-3 me-3"></i>
                <p class="mb-0">{{ __('Знайомство з молодими музикантами з різних регіонів України.') }}</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="d-flex">
                <i class="bi bi-trophy text-primary fs-3 me-3"></i>
                <p class="mb-0">{{ __('Дипломи, відзнаки, спеціальні нагороди та можливість виступити у гала-концерті.') }}</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="d-flex">
                <i class="bi bi-cash-coin text-primary fs-3 me-3"></i>
                <p class="mb-0">{{ __('Участь без вступного внеску.') }}</p>
            </div>
        </div>
    </div>
</section>

@if($latestNews->isNotEmpty())
<section class="bg-light py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0 section-title">{{ __('Останні новини') }}</h2>
            <a href="{{ route('news') }}" class="btn btn-outline-primary btn-sm">{{ __('Усі новини') }}</a>
        </div>
        <div class="row g-4">
            @foreach($latestNews as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-lift">
                        @if($item->image_path)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image_path) }}" class="card-img-top gallery-img" alt="{{ $item->title }}">
                        @endif
                        <div class="card-body">
                            <h3 class="h6">{{ $item->title }}</h3>
                            <p class="text-muted small">{{ $item->created_at->format('d.m.Y') }}</p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($item->body), 100) }}</p>
                            <a href="{{ route('news.show', $item) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
