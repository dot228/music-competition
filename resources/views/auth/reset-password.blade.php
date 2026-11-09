@extends('layouts.app')

@section('title', __('Новий пароль'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 mb-4 text-center">{{ __('Встановлення нового пароля') }}</h1>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $email) }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Новий пароль') }}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            <div class="form-text">{{ __('Щонайменше 8 символів, хоча б одна літера та одна цифра.') }}</div>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Підтвердження пароля') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">{{ __('Змінити пароль') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
