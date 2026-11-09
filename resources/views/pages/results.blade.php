@extends('layouts.app')

@section('title', __('Результати'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('Результати конкурсу') }}</h1>

    <h2 class="h4 section-title">{{ __('Результати онлайн-туру') }}</h2>
    <p>{{ __('Кожен учасник також отримає повідомлення на електронну адресу, зазначену в заявці. Організатори не повідомляють результати телефоном до їх офіційного оприлюднення.') }}</p>

    @if($advanced->isEmpty())
        <p>{{ __('Список учасників, допущених до очного конкурсного відбору, буде оприлюднено після підписання протоколу журі та рішення Організаційного комітету.') }}</p>
    @else
        <p>{{ __('До очного конкурсного відбору допущено:') }}</p>
        @foreach($advanced as $specialty => $items)
            <h3 class="h5 mt-3">{{ __(\App\Models\Application::SPECIALTIES[$specialty] ?? $specialty) }}</h3>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>{{ __('Реєстраційний номер') }}</th>
                            <th>{{ __('Учасник') }}</th>
                            <th>{{ __('Населений пункт') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $application)
                            <tr>
                                <td>{{ $application->registrationNumber() }}</td>
                                <td>{{ $application->full_name }}</td>
                                <td>{{ $application->city }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @endif

    <h2 class="h4 mt-4 section-title">{{ __('Результати очного туру') }}</h2>
    <p>{{ __('Результати Richter Junior Competition 2027 буде оприлюднено після завершення очного конкурсного відбору та підписання протоколу журі.') }}</p>
    <p>{{ __('Результати публікуються окремо за спеціальностями:') }}</p>
    <ul>
        <li>{{ __('фортепіано;') }}</li>
        <li>{{ __('скрипка;') }}</li>
        <li>{{ __('віолончель;') }}</li>
        <li>{{ __('флейта.') }}</li>
    </ul>
    <p>{{ __('За підсумками Конкурсу можуть бути визначені:') }}</p>
    <ul>
        <li>{{ __('володар або володарка Гран-прі;') }}</li>
        <li>{{ __('лауреати І, ІІ та ІІІ ступенів;') }}</li>
        <li>{{ __('дипломанти;') }}</li>
        <li>{{ __('володарі спеціальних нагород і партнерських відзнак.') }}</li>
    </ul>
    <p>{{ __('Журі має право не присуджувати окремі місця або Гран-прі, ділити місця між учасниками та присуджувати спеціальні відзнаки відповідно до Положення.') }}</p>

    <p class="text-muted mt-4">
        <i class="bi bi-hourglass-split me-2"></i>{{ __('Офіційні результати ще не оприлюднені. Стежте за оновленнями на сайті 27 лютого 2027 року.') }}
    </p>

    @if(!$results->isEmpty())
        @foreach($results as $category => $items)
            <h2 class="h4 mt-4">{{ __(\App\Models\Application::SPECIALTIES[$category] ?? $category) }}</h2>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th style="width:220px;">{{ __('Нагорода') }}</th>
                            <th>{{ __('Учасник') }}</th>
                            <th>{{ __('Твір') }}</th>
                            <th>{{ __('Коментар') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $result)
                            <tr>
                                <td>{{ $result->awardIcon() }} {{ __($result->awardLabel()) }}</td>
                                <td>{{ $result->participant_name }}</td>
                                <td>{{ $result->work_title }}</td>
                                <td class="text-muted small">{{ $result->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @endif
</div>
@endsection
