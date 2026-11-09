@extends('layouts.admin')

@section('title', 'Звернення')

@section('content')
<h1 class="h3 mb-4">Звернення</h1>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Дата</th>
                    <th>Тема</th>
                    <th>Ім'я</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($contactMessages as $contactMessage)
                    <tr>
                        <td>{{ $contactMessage->id }}</td>
                        <td>{{ $contactMessage->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ $contactMessage->topicLabel() }}</td>
                        <td>{{ $contactMessage->name }}</td>
                        <td>{{ $contactMessage->email }}</td>
                        <td>{{ $contactMessage->phone }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.contact-messages.show', $contactMessage) }}" class="btn btn-sm btn-outline-primary">Переглянути</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Звернень не знайдено.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $contactMessages->links() }}
</div>
@endsection
