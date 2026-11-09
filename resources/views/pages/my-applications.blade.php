@extends('layouts.app')


@section('title', __('Мої заявки'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('Мої заявки') }}</h1>
    @if($applications->isEmpty())
        <p class="text-muted">{{ __('Ви ще не подавали заявок.') }} <a href="{{ route('apply') }}">{{ __('Подати першу заявку') }}</a></p>
    @else
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Дата подачі') }}</th>
                        <th>{{ __('Реєстраційний номер') }}</th>
                        <th>{{ __('Спеціальність') }}</th>
                        <th>{{ __('Статус') }}</th>
                        <th>{{ __('Коментар журі') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{ $application->id }}</td>
                            <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                            <td>{{ $application->registrationNumber() }}</td>
                            <td>{{ __($application->specialtyLabel()) }}</td>
                            <td>
                                @if($application->status === 'approved')
                                    <span class="badge bg-success">{{ __($application->statusLabel()) }}</span>
                                @elseif($application->status === 'rejected')
                                    <span class="badge bg-danger">{{ __($application->statusLabel()) }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __($application->statusLabel()) }}</span>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $application->admin_comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
