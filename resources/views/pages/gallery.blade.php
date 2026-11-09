@extends('layouts.app')

@section('title', __('Галерея'))

@section('content')
<div class="container py-5">
    <h1 class="mb-3">{{ __('Галерея') }}</h1>
    <p class="lead">{{ __('Музика, місто, люди') }}</p>
    <p>{{ __('Richter Junior Competition проводиться вперше. Галерея проєкту починається не з архіву минулих років, а з підготовки: знайомства з Житомиром, сценами Конкурсу, членами журі та людьми, які створюють цю подію.') }}</p>
    <p>{{ __('Тут з\'являтимуться фото й відео з підготовчих зустрічей, звернення членів журі, кадри Житомирської обласної філармонії, репетиції, виступи фіналістів, церемонія нагородження та гала-концерт.') }}</p>

    <h2 class="h4 mt-4 section-title">{{ __('Добірки') }}</h2>
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a href="{{ route('gallery') }}" class="btn btn-sm {{ $collection ? 'btn-outline-primary' : 'btn-primary' }}">{{ __('Усі фото') }}</a>
        @foreach($collections as $key => $label)
            <a href="{{ route('gallery', ['collection' => $key]) }}" class="btn btn-sm {{ $collection === $key ? 'btn-primary' : 'btn-outline-primary' }}">{{ __($label) }}</a>
        @endforeach
    </div>

    @if($images->isEmpty())
        <p class="text-muted mt-4">
            <i class="bi bi-hourglass-split me-2"></i>{{ __('Галерея Richter Junior Competition 2027 формується. Перші фото, відеозвернення та історії підготовки з\'являться незабаром.') }}
        </p>
    @else
        <div class="row g-4">
            @foreach($images as $image)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm h-100 card-lift">
                        @if($image->isVideo())
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ $image->embedUrl() }}" title="{{ $image->title ?? __('Відео галереї') }}" allowfullscreen></iframe>
                            </div>
                        @else
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($image->image_path) }}" class="card-img-top gallery-img" alt="{{ $image->title ?? __('Фото галереї') }}">
                        @endif
                        @if($image->title || $image->collectionLabel())
                            <div class="card-body py-2">
                                @if($image->title)
                                    <p class="card-text small mb-1">{{ $image->title }}</p>
                                @endif
                                @if($image->collectionLabel())
                                    <p class="card-text small text-muted mb-0">{{ __($image->collectionLabel()) }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $images->links() }}
        </div>
    @endif
</div>
@endsection
