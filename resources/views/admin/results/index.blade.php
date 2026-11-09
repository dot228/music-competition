@extends('layouts.admin')

@section('title', 'Результати')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Результати</h1>
    <a href="{{ route('admin.results.create') }}" class="btn btn-primary">Додати результат</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Категорія</th>
                    <th>Нагорода</th>
                    <th>Учасник</th>
                    <th>Робота</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($results as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ \App\Models\Application::SPECIALTIES[$result->category] ?? $result->category }}</td>
                        <td>{{ $result->awardIcon() }} {{ $result->awardLabel() }}</td>
                        <td>{{ $result->participant_name }}</td>
                        <td>{{ $result->work_title }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.results.edit', $result) }}" class="btn btn-sm btn-outline-primary">Редагувати</a>
                            <form method="POST" action="{{ route('admin.results.destroy', $result) }}" class="d-inline" onsubmit="return confirm('Видалити результат?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">Результатів ще немає.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $results->links() }}
</div>
@endsection
