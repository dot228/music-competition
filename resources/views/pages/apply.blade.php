@extends('layouts.app')

@section('title', __('Подати заявку'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <h1 class="mb-3">{{ __('Заявка на Richter Junior Competition 2027') }}</h1>
            <p>{{ __('Заявки на участь у першому, онлайн-турі приймаються з 25 січня до 5 лютого 2027 року включно. Участь у Конкурсі безкоштовна.') }}</p>
            <p class="mb-4">{{ __('Підготуйте конкурсне відео, точну програму виступу, коротку творчу біографію, контактні дані викладача та законного представника.') }}</p>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('apply.store') }}" enctype="multipart/form-data">
                        @csrf

                        <h2 class="h5 section-title">{{ __('Крок 1. Дані учасника') }}</h2>
                        <div class="row g-3 mb-4 row-align-labels">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Прізвище, ім\'я та по батькові (за наявності)') }} <span class="text-danger">*</span></label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" required>
                                @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Дата народження') }} <span class="text-danger">*</span></label>
                                <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="form-control @error('birth_date') is-invalid @enderror" required>
                                @error('birth_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Обрана спеціальність') }} <span class="text-danger">*</span></label>
                                <select name="specialty" class="form-select @error('specialty') is-invalid @enderror" required>
                                    <option value="">{{ __('— Оберіть —') }}</option>
                                    @foreach(\App\Models\Application::SPECIALTIES as $key => $label)
                                        <option value="{{ $key }}" @selected(old('specialty') === $key)>{{ __($label) }}</option>
                                    @endforeach
                                </select>
                                @error('specialty')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Область і населений пункт') }} <span class="text-danger">*</span></label>
                                <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" required>
                                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Назва закладу мистецької освіти') }} <span class="text-danger">*</span></label>
                                <input type="text" name="institution" value="{{ old('institution') }}" class="form-control @error('institution') is-invalid @enderror" required>
                                @error('institution')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Клас навчання') }} <span class="text-danger">*</span></label>
                                <input type="text" name="study_year" value="{{ old('study_year') }}" class="form-control @error('study_year') is-invalid @enderror" required>
                                @error('study_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Прізвище, ім\'я та по батькові викладача') }} <span class="text-danger">*</span></label>
                                <input type="text" name="teacher_name" value="{{ old('teacher_name') }}" class="form-control @error('teacher_name') is-invalid @enderror" required>
                                @error('teacher_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __('Документ, що підтверджує вік учасника') }} <span class="text-danger">*</span></label>
                                <input type="file" name="age_document" class="form-control @error('age_document') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf" required>
                                <div class="form-text">{{ __('JPG, PNG або PDF, до 10 МБ.') }}</div>
                                @error('age_document')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <h2 class="h5 section-title">{{ __('Крок 2. Конкурсна програма') }}</h2>
                        <p class="text-muted small mb-3">{{ __('Програма першого й другого турів не змінюється. Загальна тривалість — не більше 10 хвилин.') }}</p>
                        <div class="row g-3 mb-2 row-align-labels">
                            <div class="col-12"><strong>{{ __('Твір композитора епохи бароко або класицизму') }}</strong></div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Композитор') }} <span class="text-danger">*</span></label>
                                <input type="text" name="piece1_composer" value="{{ old('piece1_composer') }}" class="form-control @error('piece1_composer') is-invalid @enderror" required>
                                @error('piece1_composer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">{{ __('Повна назва твору та частина/номер (за наявності)') }} <span class="text-danger">*</span></label>
                                <input type="text" name="piece1_title" value="{{ old('piece1_title') }}" class="form-control @error('piece1_title') is-invalid @enderror" required>
                                @error('piece1_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Орієнтовна тривалість') }} <span class="text-danger">*</span></label>
                                <input type="text" name="piece1_duration" value="{{ old('piece1_duration') }}" class="form-control @error('piece1_duration') is-invalid @enderror" placeholder="{{ __('напр. 3:30') }}" required>
                                @error('piece1_duration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="row g-3 mb-4 row-align-labels">
                            <div class="col-12 mt-3"><strong>{{ __('Твір за вибором учасника') }}</strong></div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Композитор') }} <span class="text-danger">*</span></label>
                                <input type="text" name="piece2_composer" value="{{ old('piece2_composer') }}" class="form-control @error('piece2_composer') is-invalid @enderror" required>
                                @error('piece2_composer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">{{ __('Повна назва твору та частина/номер (за наявності)') }} <span class="text-danger">*</span></label>
                                <input type="text" name="piece2_title" value="{{ old('piece2_title') }}" class="form-control @error('piece2_title') is-invalid @enderror" required>
                                @error('piece2_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Орієнтовна тривалість') }} <span class="text-danger">*</span></label>
                                <input type="text" name="piece2_duration" value="{{ old('piece2_duration') }}" class="form-control @error('piece2_duration') is-invalid @enderror" placeholder="{{ __('напр. 4:00') }}" required>
                                @error('piece2_duration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Загальна тривалість програми') }} <span class="text-danger">*</span></label>
                                <input type="text" name="program_duration" value="{{ old('program_duration') }}" class="form-control @error('program_duration') is-invalid @enderror" placeholder="{{ __('напр. 9:30, не більше 10 хв') }}" required>
                                @error('program_duration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <h2 class="h5 section-title">{{ __('Крок 3. Відео') }}</h2>
                        <p class="text-muted small">{{ __('Вставте активне посилання на відео YouTube. Перед відправленням відкрийте його в режимі приватного браузера та переконайтеся, що відео доступне без запиту дозволу.') }}</p>
                        <p class="text-muted small">{{ __('Якщо відео має обмежений доступ, оберіть налаштування «Доступ за посиланням». Не видаляйте запис і не змінюйте посилання до офіційного завершення Конкурсу.') }}</p>
                        <div class="mb-4">
                            <label class="form-label">{{ __('Посилання на відео YouTube') }} <span class="text-danger">*</span></label>
                            <input type="url" name="video_link" value="{{ old('video_link') }}" class="form-control @error('video_link') is-invalid @enderror" placeholder="https://youtube.com/..." required>
                            @error('video_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <h2 class="h5 section-title">{{ __('Крок 4. Творча біографія') }}</h2>
                        <p class="text-muted small">{{ __('Обсяг — до 700 знаків. Зазначте заклад, викладача, тривалість навчання, найважливіші виступи або конкурсні досягнення. Не потрібно перераховувати всі дипломи дитини.') }}</p>
                        <div class="mb-4">
                            <label class="form-label">{{ __('Творча біографія') }} <span class="text-danger">*</span></label>
                            <textarea name="bio" rows="5" maxlength="700" class="form-control @error('bio') is-invalid @enderror" required>{{ old('bio') }}</textarea>
                            @error('bio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <h2 class="h5 section-title">{{ __('Крок 5. Законний представник') }}</h2>
                        <div class="row g-3 mb-3 row-align-labels">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Прізвище та ім\'я одного з батьків або законного представника') }} <span class="text-danger">*</span></label>
                                <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" class="form-control @error('guardian_name') is-invalid @enderror" required>
                                @error('guardian_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Номер телефону') }} <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="+380..." required>
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Електронна пошта') }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" name="agree_rules" value="1" id="agree_rules" class="form-check-input @error('agree_rules') is-invalid @enderror" @checked(old('agree_rules')) required>
                            <label class="form-check-label" for="agree_rules">{{ __('Згода з Положенням та умовами участі') }} <span class="text-danger">*</span></label>
                            @error('agree_rules')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" name="agree_privacy" value="1" id="agree_privacy" class="form-check-input @error('agree_privacy') is-invalid @enderror" @checked(old('agree_privacy')) required>
                            <label class="form-check-label" for="agree_privacy">{{ __('Згода на обробку персональних даних') }} <span class="text-danger">*</span></label>
                            @error('agree_privacy')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" name="agree_media" value="1" id="agree_media" class="form-check-input @error('agree_media') is-invalid @enderror" @checked(old('agree_media')) required>
                            <label class="form-check-label" for="agree_media">{{ __('Медіа згода, фото та відео фіксація') }} <span class="text-danger">*</span></label>
                            @error('agree_media')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <p class="text-muted small">{{ __('Після відправлення заявки на вказану електронну адресу має надійти автоматичне підтвердження з реєстраційним номером. Якщо лист не надійшов протягом 30 хвилин, перевірте папку «Спам» або зверніться до Організаційного комітету.') }}</p>

                        <button class="btn btn-gold mt-2" type="submit">{{ __('Надіслати заявку') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
