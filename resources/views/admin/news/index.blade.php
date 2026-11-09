@extends('layouts.admin')

@section('title', 'Новини')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Новини</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Додати новину</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Заголовок</th>
                    <th>Дата</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->created_at->format('d.m.Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('news.show', $item) }}" class="btn btn-sm btn-outline-secondary" target="_blank">Переглянути</a>
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-outline-primary">Редагувати</a>
                            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Видалити новину?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">Новин ще немає.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $news->links() }}
</div>
@endsection
