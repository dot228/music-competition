@extends('layouts.app')

@section('title', $news->localizedTitle())

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="{{ route('news') }}" class="btn btn-outline-primary btn-sm mb-4">
                <i class="bi bi-arrow-left me-1"></i>{{ __('Усі новини') }}
            </a>
            <h1 class="mb-2">{{ $news->localizedTitle() }}</h1>
            <p class="text-muted">{{ $news->created_at->format('d.m.Y H:i') }}</p>
            @if($news->image_path)
                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($news->image_path) }}" class="img-fluid rounded mb-4" alt="{{ $news->localizedTitle() }}">
            @endif
            <div class="fs-5">
                {!! nl2br(e($news->localizedBody())) !!}
            </div>

            @if($news->photos->isNotEmpty())
                <h2 class="h5 mt-5 section-title">{{ __('Фото') }}</h2>
                <div class="row g-3">
                    @foreach($news->photos as $photo)
                        <div class="col-6 col-md-4">
                            <a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($photo->path) }}" target="_blank" rel="noopener">
                                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($photo->path) }}" class="img-fluid rounded gallery-img w-100" alt="{{ $news->localizedTitle() }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($news->videos->isNotEmpty())
                <h2 class="h5 mt-5 section-title">{{ __('Відео') }}</h2>
                <div class="row g-3">
                    @foreach($news->videos as $video)
                        <div class="col-md-6">
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ $video->embedUrl() }}" title="{{ __('Відео новини') }}" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
