@extends('layouts.admin')

@section('title', 'Звернення #' . $contactMessage->id)

@section('content')
<a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-primary btn-sm mb-3"><i class="bi bi-arrow-left me-1"></i>Усі звернення</a>
<h1 class="h3 mb-4">Звернення #{{ $contactMessage->id }}</h1>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">Дані звернення</div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-4">Тема</dt><dd class="col-sm-8">{{ $contactMessage->topicLabel() }}</dd>
                    <dt class="col-sm-4">Ім'я</dt><dd class="col-sm-8">{{ $contactMessage->name }}</dd>
                    <dt class="col-sm-4">Email</dt><dd class="col-sm-8">{{ $contactMessage->email }}</dd>
                    <dt class="col-sm-4">Телефон</dt><dd class="col-sm-8">{{ $contactMessage->phone }}</dd>
                    <dt class="col-sm-4">Повідомлення</dt><dd class="col-sm-8">{{ $contactMessage->message }}</dd>
                    <dt class="col-sm-4">Згода на обробку даних</dt><dd class="col-sm-8">{{ $contactMessage->agree_privacy ? 'Так' : 'Ні' }}</dd>
                    <dt class="col-sm-4">Подано</dt><dd class="col-sm-8">{{ $contactMessage->created_at->format('d.m.Y H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">Дії</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" onsubmit="return confirm('Видалити звернення?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit">Видалити звернення</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
