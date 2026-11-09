@extends('layouts.app')

@section('title', __('Контакти'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('Контакти') }}</h1>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h5 mb-3">{{ __('Організаційні питання') }}</h2>
                    <p class="fw-semibold mb-2">{{ __('Музична школа імені Святослава Ріхтера') }}</p>
                    <p><i class="bi bi-geo-alt text-primary me-2"></i>{{ __('10008, м. Житомир, вул. Івана Франка, 12') }}</p>
                    <p><i class="bi bi-telephone text-primary me-2"></i><a href="tel:+380412430696">+38 (0412) 43-06-96</a></p>
                    <p class="mb-0"><i class="bi bi-envelope text-primary me-2"></i><a href="mailto:richterschool.zt@ukr.net">richterschool.zt@ukr.net</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h5 mb-3">{{ __('Офіційне листування') }}</h2>
                    <p class="fw-semibold mb-2">{{ __('Управління культури Житомирської міської ради') }}</p>
                    <p><i class="bi bi-geo-alt text-primary me-2"></i>{{ __('10002, м. Житомир, вул. Велика Бердичівська, 61/18') }}</p>
                    <p><i class="bi bi-telephone text-primary me-2"></i><a href="tel:+380412437977">+38 (0412) 43-79-77</a></p>
                    <p class="mb-0"><i class="bi bi-envelope text-primary me-2"></i><a href="mailto:kylt@zt-rada.gov.ua">kylt@zt-rada.gov.ua</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h5 mb-3">{{ __('Місце проведення очного туру') }}</h2>
                    <p class="fw-semibold mb-2">{{ __('Житомир') }}</p>
{{--                    <p><i class="bi bi-geo-alt text-primary me-2"></i>{{ __('10014, м. Житомир, вул. Віктора Косенка, 26') }}</p>--}}
                    <p class="mb-0 text-muted small">{{ __('Очний конкурсний відбір відбудеться 26 лютого 2027 року. Церемонія нагородження та гала-концерт — 27 лютого 2027 року.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h4 mt-5 section-title">{{ __('Як звернутися') }}</h2>
    <p>{{ __('У темі електронного листа зазначте: «Richter Junior Competition» та прізвище учасника. У повідомленні коротко опишіть питання і вкажіть номер заявки — якщо вона вже зареєстрована.') }}</p>
    <p>{{ __('Організаційний комітет відповідає на звернення у робочі дні. Питання, відповідь на які вже опублікована в Положенні або FAQ, можуть бути переадресовані на відповідний розділ сайту.') }}</p>

    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 mb-3">{{ __('Форма звернення') }}</h2>
                    <form method="POST" action="{{ route('contacts.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Тема') }} <span class="text-danger">*</span></label>
                                <select name="topic" class="form-select @error('topic') is-invalid @enderror" required>
                                    <option value="">{{ __('— Оберіть тему —') }}</option>
                                    @foreach(\App\Models\ContactMessage::TOPICS as $key => $label)
                                        <option value="{{ $key }}" @selected(old('topic') === $key)>{{ __($label) }}</option>
                                    @endforeach
                                </select>
                                @error('topic')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Ім\'я') }} <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()?->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Телефон') }} <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="+380..." required>
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __('Повідомлення') }} <span class="text-danger">*</span></label>
                                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-check mt-3">
                            <input type="checkbox" name="agree_privacy" value="1" id="agree_privacy" class="form-check-input @error('agree_privacy') is-invalid @enderror" @checked(old('agree_privacy')) required>
                            <label class="form-check-label" for="agree_privacy">{{ __('Згода на обробку персональних даних') }} <span class="text-danger">*</span></label>
                            @error('agree_privacy')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <button class="btn btn-primary mt-4" type="submit">{{ __('Надіслати') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
