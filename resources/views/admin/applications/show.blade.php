@extends('layouts.admin')

@section('title', 'Заявка #' . $application->id)

@section('content')
<a href="{{ route('admin.applications.index') }}" class="btn btn-outline-primary btn-sm mb-3"><i class="bi bi-arrow-left me-1"></i>Усі заявки</a>
<h1 class="h3 mb-4">Заявка #{{ $application->id }}</h1>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">Дані заявки</div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-4">Реєстраційний номер</dt><dd class="col-sm-8">{{ $application->registrationNumber() }}</dd>
                    <dt class="col-sm-4">Учасник (ПІБ)</dt><dd class="col-sm-8">{{ $application->full_name }}</dd>
                    <dt class="col-sm-4">Дата народження</dt><dd class="col-sm-8">{{ $application->birth_date?->format('d.m.Y') ?? '—' }}</dd>
                    <dt class="col-sm-4">Область і населений пункт</dt><dd class="col-sm-8">{{ $application->city }}</dd>
                    <dt class="col-sm-4">Заклад освіти</dt><dd class="col-sm-8">{{ $application->institution }}</dd>
                    <dt class="col-sm-4">Клас / рік навчання</dt><dd class="col-sm-8">{{ $application->study_year }}</dd>
                    <dt class="col-sm-4">Викладач</dt><dd class="col-sm-8">{{ $application->teacher_name }}</dd>
                    <dt class="col-sm-4">Спеціальність</dt><dd class="col-sm-8">{{ $application->specialtyLabel() }}</dd>
                    <dt class="col-sm-4">Документ про вік</dt>
                    <dd class="col-sm-8">
                        @if($application->age_document)
                            <a href="{{ route('admin.applications.age-document', $application) }}">Відкрити файл</a>
                        @else — @endif
                    </dd>

                    <dt class="col-sm-4 mt-3">Твір 1 (бароко/класицизм)</dt>
                    <dd class="col-sm-8 mt-3">{{ $application->piece1_composer }} — {{ $application->piece1_title }} ({{ $application->piece1_duration }})</dd>
                    <dt class="col-sm-4">Твір 2 (за вибором)</dt>
                    <dd class="col-sm-8">{{ $application->piece2_composer }} — {{ $application->piece2_title }} ({{ $application->piece2_duration }})</dd>
                    <dt class="col-sm-4">Загальна тривалість</dt><dd class="col-sm-8">{{ $application->program_duration }}</dd>

                    <dt class="col-sm-4 mt-3">Відео</dt>
                    <dd class="col-sm-8 mt-3"><a href="{{ $application->video_link }}" target="_blank" rel="noopener">{{ $application->video_link }}</a></dd>
                    <dt class="col-sm-4">Творча біографія</dt><dd class="col-sm-8">{{ $application->bio }}</dd>

                    <dt class="col-sm-4 mt-3">Законний представник</dt><dd class="col-sm-8 mt-3">{{ $application->guardian_name }}</dd>
                    <dt class="col-sm-4">Телефон представника</dt><dd class="col-sm-8">{{ $application->phone }}</dd>
                    <dt class="col-sm-4">Email представника</dt><dd class="col-sm-8">{{ $application->email }}</dd>
                    <dt class="col-sm-4">Згоди</dt>
                    <dd class="col-sm-8">
                        <span class="badge {{ $application->agree_rules ? 'bg-success' : 'bg-danger' }}">Положення</span>
                        <span class="badge {{ $application->agree_privacy ? 'bg-success' : 'bg-danger' }}">Персональні дані</span>
                        <span class="badge {{ $application->agree_media ? 'bg-success' : 'bg-danger' }}">Фото/відео</span>
                    </dd>

                    <dt class="col-sm-4 mt-3">Користувач</dt>
                    <dd class="col-sm-8 mt-3">{{ $application->user?->name }} ({{ $application->user?->email }})</dd>
                    <dt class="col-sm-4">Подано</dt><dd class="col-sm-8">{{ $application->created_at->format('d.m.Y H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Обробка заявки</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.applications.update', $application) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Статус</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            @foreach(\App\Models\Application::STATUSES as $key => $label)
                                <option value="{{ $key }}" @selected($application->status === $key)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Коментар (бачить учасник)</label>
                        <textarea name="admin_comment" rows="3" class="form-control @error('admin_comment') is-invalid @enderror">{{ old('admin_comment', $application->admin_comment) }}</textarea>
                        @error('admin_comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Зберегти</button>
                </form>

                @if($application->hasResult())
                    <hr>
                    <p class="mb-2">
                        @if($application->result_notified_at)
                            <i class="bi bi-envelope-check text-success me-1"></i>Лист про результат надіслано {{ $application->result_notified_at->format('d.m.Y H:i') }}
                        @else
                            <i class="bi bi-envelope-exclamation text-warning me-1"></i>Лист про результат ще не надіслано
                        @endif
                    </p>
                    <form method="POST" action="{{ route('admin.applications.send-result', $application) }}" onsubmit="return confirm('Надіслати учаснику лист про результат відбору?');">
                        @csrf
                        <button class="btn btn-outline-primary btn-sm" type="submit">
                            {{ $application->result_notified_at ? 'Надіслати повторно' : 'Надіслати лист про результат' }}
                        </button>
                    </form>
                @endif

                <hr>
                <form method="POST" action="{{ route('admin.applications.destroy', $application) }}" onsubmit="return confirm('Видалити заявку?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit">Видалити заявку</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
