@extends('layouts.admin')

@section('title', 'Дашборд')

@section('content')
<h1 class="h3 mb-4">Дашборд</h1>

<div class="row g-3 mb-4">
    <div class="col-md-2">
        <div class="card stat-graphite">
            <div class="card-body">
                <div class="fs-3 fw-bold">{{ $stats['applications'] }}</div>
                <div class="small">Заявок усього</div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-red">
            <div class="card-body">
                <div class="fs-3 fw-bold">{{ $stats['newApplications'] }}</div>
                <div class="small">Нових заявок</div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-gold">
            <div class="card-body">
                <div class="fs-3 fw-bold">{{ $stats['news'] }}</div>
                <div class="small">Новин</div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-graphite">
            <div class="card-body">
                <div class="fs-3 fw-bold">{{ $stats['results'] }}</div>
                <div class="small">Результатів</div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-red">
            <div class="card-body">
                <div class="fs-3 fw-bold">{{ $stats['gallery'] }}</div>
                <div class="small">Фото в галереї</div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-gold">
            <div class="card-body">
                <div class="fs-3 fw-bold">{{ $stats['users'] }}</div>
                <div class="small">Користувачів</div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-graphite">
            <div class="card-body">
                <div class="fs-3 fw-bold">{{ $stats['contactMessages'] }}</div>
                <div class="small">Звернень</div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Останні заявки</span>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-sm btn-outline-primary">Усі заявки</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Дата</th>
                    <th>ПІБ</th>
                    <th>Реєстраційний №</th>
                    <th>Спеціальність</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentApplications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                        <td><a href="{{ route('admin.applications.show', $application) }}">{{ $application->full_name }}</a></td>
                        <td>{{ $application->registrationNumber() }}</td>
                        <td>{{ $application->specialtyLabel() }}</td>
                        <td><span class="badge bg-secondary">{{ $application->statusLabel() }}</span></td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">Заявок ще немає.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
