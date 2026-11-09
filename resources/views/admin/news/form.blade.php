@extends('layouts.admin')

@section('title', $news->exists ? 'Редагувати новину' : 'Додати новину')

@section('content')
<a href="{{ route('admin.news.index') }}" class="btn btn-outline-primary btn-sm mb-3"><i class="bi bi-arrow-left me-1"></i>Усі новини</a>
<h1 class="h3 mb-4">{{ $news->exists ? 'Редагувати новину' : 'Додати новину' }}</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $news->exists ? route('admin.news.update', $news) : route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            @if($news->exists)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label class="form-label">Заголовок <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Текст <span class="text-danger">*</span></label>
                <textarea name="body" rows="10" class="form-control @error('body') is-invalid @enderror" required>{{ old('body', $news->body) }}</textarea>
                @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <hr>
            <p class="text-muted small">English version (optional) — shown on the site when a visitor switches to English.</p>
            <div class="mb-3">
                <label class="form-label">Title (EN)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $news->title_en) }}" class="form-control @error('title_en') is-invalid @enderror">
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Body (EN)</label>
                <textarea name="body_en" rows="10" class="form-control @error('body_en') is-invalid @enderror">{{ old('body_en', $news->body_en) }}</textarea>
                @error('body_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>

            <div class="mb-3">
                <label class="form-label">Зображення-обкладинка (до 5 МБ)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @if($news->image_path)
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($news->image_path) }}" class="img-thumbnail mt-2" style="max-height: 150px;" alt="">
                @endif
            </div>

            <hr>
            <p class="text-muted small">Додаткові фото й відео — відображаються в галереї на сторінці новини.</p>
            <div class="mb-3">
                <label class="form-label">Додати фото (можна кілька, до 5 МБ кожне)</label>
                <input type="file" name="photos[]" class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror" accept="image/*" multiple>
                @error('photos')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @error('photos.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Додати відео — посилання на YouTube (по одному на рядок)</label>
                <textarea name="video_urls" rows="3" class="form-control @error('video_urls') is-invalid @enderror" placeholder="https://www.youtube.com/watch?v=...">{{ old('video_urls') }}</textarea>
                @error('video_urls')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <hr>

            <button class="btn btn-primary" type="submit">Зберегти</button>
        </form>

        @if($news->exists && $news->media->isNotEmpty())
            <hr>
            <h2 class="h6">Додані медіа</h2>
            <div class="row g-3">
                @foreach($news->media as $media)
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="card h-100">
                            @if($media->type === 'photo')
                                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($media->path) }}" class="card-img-top" style="height: 100px; object-fit: cover;" alt="">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center bg-dark text-white" style="height: 100px;">
                                    <i class="bi bi-youtube fs-2"></i>
                                </div>
                            @endif
                            <div class="card-body p-2">
                                <form method="POST" action="{{ route('admin.news.media.destroy', [$news, $media]) }}" onsubmit="return confirm('Видалити медіафайл?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger w-100" type="submit">Видалити</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
