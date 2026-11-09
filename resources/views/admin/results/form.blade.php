@extends('layouts.admin')

@section('title', $result->exists ? 'Редагувати результат' : 'Додати результат')

@section('content')
<a href="{{ route('admin.results.index') }}" class="btn btn-outline-primary btn-sm mb-3"><i class="bi bi-arrow-left me-1"></i>Усі результати</a>
<h1 class="h3 mb-4">{{ $result->exists ? 'Редагувати результат' : 'Додати результат' }}</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $result->exists ? route('admin.results.update', $result) : route('admin.results.store') }}">
            @csrf
            @if($result->exists)
                @method('PUT')
            @endif
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Категорія <span class="text-danger">*</span></label>
                    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                        <option value="">— Оберіть категорію —</option>
                        @foreach(\App\Models\Application::SPECIALTIES as $key => $label)
                            <option value="{{ $key }}" @selected(old('category', $result->category) === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Нагорода <span class="text-danger">*</span></label>
                    <select name="award" class="form-select @error('award') is-invalid @enderror" required>
                        <option value="">— Оберіть нагороду —</option>
                        @foreach(\App\Models\Result::AWARDS as $key => $label)
                            <option value="{{ $key }}" @selected(old('award', $result->award) === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('award')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ім'я учасника <span class="text-danger">*</span></label>
                    <input type="text" name="participant_name" value="{{ old('participant_name', $result->participant_name) }}" class="form-control @error('participant_name') is-invalid @enderror" required>
                    @error('participant_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Назва роботи</label>
                    <input type="text" name="work_title" value="{{ old('work_title', $result->work_title) }}" class="form-control @error('work_title') is-invalid @enderror">
                    @error('work_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label">Коментар</label>
                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $result->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Зберегти</button>
        </form>
    </div>
</div>
@endsection
