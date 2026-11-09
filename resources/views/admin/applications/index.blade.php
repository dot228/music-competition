@extends('layouts.admin')

@section('title', 'Заявки')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Заявки</h1>
    <form method="POST" action="{{ route('admin.applications.send-results') }}" onsubmit="return confirm('Надіслати листи про результат усім учасникам, яким ще не надсилали (статус «Допущено»/«Не допущено»)?');">
        @csrf
        <button class="btn btn-gold" type="submit"><i class="bi bi-envelope me-1"></i>Надіслати результати</button>
    </form>
</div>

<form method="GET" class="row g-2 mb-4">
    <div class="col-auto">
        <select name="status" class="form-select">
            <option value="">— Усі статуси —</option>
            @foreach(\App\Models\Application::STATUSES as $key => $label)
                <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto">
        <select name="specialty" class="form-select">
            <option value="">— Усі спеціальності —</option>
            @foreach(\App\Models\Application::SPECIALTIES as $key => $label)
                <option value="{{ $key }}" @selected(request('specialty') === $key)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-primary" type="submit">Фільтрувати</button>
    </div>
</form>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Дата</th>
                    <th>Учасник</th>
                    <th>Реєстраційний №</th>
                    <th>Спеціальність</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ $application->full_name }}</td>
                        <td>{{ $application->registrationNumber() }}</td>
                        <td>{{ $application->specialtyLabel() }}</td>
                        <td>
                            @if($application->status === 'approved')
                                <span class="badge bg-success">{{ $application->statusLabel() }}</span>
                            @elseif($application->status === 'rejected')
                                <span class="badge bg-danger">{{ $application->statusLabel() }}</span>
                            @else
                                <span class="badge bg-warning">{{ $application->statusLabel() }}</span>
                            @endif
                            @if($application->hasResult())
                                @if($application->result_notified_at)
                                    <i class="bi bi-envelope-check text-success ms-1" title="Лист про результат надіслано {{ $application->result_notified_at->format('d.m.Y H:i') }}"></i>
                                @else
                                    <i class="bi bi-envelope-exclamation text-warning ms-1" title="Лист про результат ще не надіслано"></i>
                                @endif
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.applications.show', $application) }}" class="btn btn-sm btn-outline-primary">Переглянути</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Заявок не знайдено.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $applications->links() }}
</div>
@endsection
