@extends('layouts.admin')

@section('title', 'Галерея')

@section('content')
<h1 class="h3 mb-4">Галерея</h1>

<div class="card mb-4">
    <div class="card-header">Додати фото</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Підпис (необов'язково)</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Добірка (необов'язково)</label>
                    <select name="collection" class="form-select @error('collection') is-invalid @enderror">
                        <option value="">— Без добірки —</option>
                        @foreach(\App\Models\GalleryImage::COLLECTIONS as $key => $label)
                            <option value="{{ $key }}" @selected(old('collection') === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('collection')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Фото (можна кілька, до 5 МБ кожне) <span class="text-danger">*</span></label>
                    <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" accept="image/*" multiple required>
                    @error('images')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    @error('images.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" type="submit">Завантажити</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">Додати відео (YouTube)</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.gallery.videos.store') }}">
            @csrf
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Підпис (необов'язково)</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Добірка (необов'язково)</label>
                    <select name="collection" class="form-select @error('collection') is-invalid @enderror">
                        <option value="">— Без добірки —</option>
                        @foreach(\App\Models\GalleryImage::COLLECTIONS as $key => $label)
                            <option value="{{ $key }}" @selected(old('collection') === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('collection')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Посилання на YouTube (можна кілька, по одному на рядок) <span class="text-danger">*</span></label>
                    <textarea name="video_urls" rows="2" class="form-control @error('video_urls') is-invalid @enderror" placeholder="https://www.youtube.com/watch?v=..." required>{{ old('video_urls') }}</textarea>
                    @error('video_urls')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" type="submit">Додати</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if($images->isEmpty())
    <p class="text-muted">Фото ще немає.</p>
@else
    <div class="row g-3">
        @foreach($images as $image)
            <div class="col-6 col-md-3 col-lg-2">
                <div class="card h-100">
                    @if($image->isVideo())
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-dark text-white" style="height: 140px;">
                            <i class="bi bi-youtube fs-1"></i>
                        </div>
                    @else
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($image->image_path) }}" class="card-img-top" style="height: 140px; object-fit: cover;" alt="{{ $image->title }}">
                    @endif
                    <div class="card-body p-2">
                        <p class="small text-truncate mb-1">{{ $image->title ?? '—' }}</p>
                        @if($image->collectionLabel())
                            <p class="small text-muted text-truncate mb-2">{{ $image->collectionLabel() }}</p>
                        @else
                            <p class="small text-muted mb-2">—</p>
                        @endif
                        <form method="POST" action="{{ route('admin.gallery.destroy', $image) }}" onsubmit="return confirm('Видалити?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100" type="submit">Видалити</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-3">
        {{ $images->links() }}
    </div>
@endif
@endsection
