@extends('layouts.app')

@section('title', __('Новини'))

@section('content')
<div class="container py-5">
    <h1 class="mb-3">{{ __('Новини') }}</h1>
    <p class="lead mb-4">{{ __('Офіційні оголошення, знайомство з журі, інструкції для учасників, результати онлайн-відбору та історії першого Richter Junior Competition.') }}</p>
    @if($news->isEmpty())
        <p class="text-muted">{{ __('Новин поки немає.') }}</p>
    @else
        <div class="row g-4">
            @foreach($news as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-lift">
                        @if($item->image_path)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image_path) }}" class="card-img-top gallery-img" alt="{{ $item->localizedTitle() }}">
                        @endif
                        <div class="card-body">
                            <h2 class="h6">{{ $item->localizedTitle() }}</h2>
                            <p class="text-muted small">{{ $item->created_at->format('d.m.Y') }}</p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($item->localizedBody()), 120) }}</p>
                            <a href="{{ route('news.show', $item) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $news->links() }}
        </div>
    @endif

    <h2 class="h4 mt-5 section-title">{{ __('Наступні матеріали') }}</h2>
    <ul class="text-muted">
        <li>{{ __('Представляємо голову журі — Мауріціо Біньйоне.') }}</li>
        <li>{{ __('Як правильно записати конкурсне відео.') }}</li>
        <li>{{ __('П\'ять критеріїв, за якими журі оцінюватиме учасників.') }}</li>
        <li>{{ __('Відкрито приймання заявок.') }}</li>
        <li>{{ __('Останній тиждень подання заявок.') }}</li>
        <li>{{ __('Оголошено фіналістів онлайн-туру.') }}</li>
        <li>{{ __('Порядок виступів 26 лютого.') }}</li>
        <li>{{ __('Переможці Richter Junior Competition 2027.') }}</li>
        <li>{{ __('Перший конкурс у фотографіях і цифрах.') }}</li>
    </ul>
</div>
@endsection
