@extends('layouts.app')

@section('title', __('Відновлення пароля'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 mb-3 text-center">{{ __('Відновлення пароля') }}</h1>
                    <p class="text-muted text-center">{{ __('Вкажіть email, зазначений при реєстрації. Ми надішлемо посилання для встановлення нового пароля.') }}</p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button class="btn btn-primary w-100" type="submit">{{ __('Надіслати посилання') }}</button>
                    </form>
                    <p class="text-center mt-3 mb-0"><a href="{{ route('login') }}">{{ __('Повернутися до входу') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
