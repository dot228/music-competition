<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Адмінка') — {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
</head>
<body class="admin-body">
<div class="d-flex">
    <nav class="sidebar p-3 flex-shrink-0" style="width: 240px;">
        <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none fs-5 fw-bold d-block mb-4">🎹 Адмінка</a>
        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>Дашборд
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.applications.*')) active @endif" href="{{ route('admin.applications.index') }}">
                    <i class="bi bi-inbox me-2"></i>Заявки
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                    <i class="bi bi-newspaper me-2"></i>Новини
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.results.*')) active @endif" href="{{ route('admin.results.index') }}">
                    <i class="bi bi-trophy me-2"></i>Результати
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.gallery.*')) active @endif" href="{{ route('admin.gallery.index') }}">
                    <i class="bi bi-images me-2"></i>Галерея
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.contact-messages.*')) active @endif" href="{{ route('admin.contact-messages.index') }}">
                    <i class="bi bi-envelope-open me-2"></i>Звернення
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.password.*')) active @endif" href="{{ route('admin.password.edit') }}">
                    <i class="bi bi-key me-2"></i>Змінити пароль
                </a>
            </li>
        </ul>
        <hr class="text-white-50">
        <a class="nav-link text-white-50" href="{{ route('home') }}"><i class="bi bi-box-arrow-up-left me-2"></i>На сайт</a>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button class="btn btn-outline-light btn-sm w-100" type="submit">Вийти</button>
        </form>
    </nav>

    <main class="flex-grow-1 p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
