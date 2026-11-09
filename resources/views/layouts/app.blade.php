<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('Конкурс')) — {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@400;500;600&family=Pinyon+Script&display=swap" rel="stylesheet">
    @php
        $themeCssPath = file_exists(public_path('css/theme.css'))
            ? public_path('css/theme.css')
            : base_path('css/theme.css');
        $themeCssVersion = file_exists($themeCssPath) ? filemtime($themeCssPath) : time();
    @endphp
    <link href="{{ asset('css/theme.css') }}?v={{ $themeCssVersion }}" rel="stylesheet">
</head>
<body>
<header class="site-header">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid align-items-lg-end">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" class="site-logo" alt="Richter Junior Competition">
            <img src="{{ asset('images/logo2.png') }}" class="site-logo2-mobile d-lg-none" alt="Richter Junior Competition">
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-items-lg-end" id="mainNav">
            <ul class="navbar-nav nav-piano ms-auto">
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('home')) active @endif" href="{{ route('home') }}">{{ __('Головна') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('about')) active @endif" href="{{ route('about') }}">{{ __('Про конкурс') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('jury')) active @endif" href="{{ route('jury') }}">{{ __('Журі') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('jury.head')) active @endif" href="{{ route('jury.head') }}">{{ __('Голова журі') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('participants')) active @endif" href="{{ route('participants') }}">{{ __('Учасникам') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('gallery')) active @endif" href="{{ route('gallery') }}">{{ __('Галерея') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('results')) active @endif" href="{{ route('results') }}">{{ __('Результати') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('news*')) active @endif" href="{{ route('news') }}">{{ __('Новини') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('partners')) active @endif" href="{{ route('partners') }}">{{ __('Партнери') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('contacts')) active @endif" href="{{ route('contacts') }}">{{ __('Контакти') }}</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('faq')) active @endif" href="{{ route('faq') }}">FAQ</a></li>
                <li class="nav-item"><a class="nav-link @if(request()->routeIs('apply')) active @endif" href="{{ route('apply') }}">{{ __('Подати заявку') }}</a></li>
            </ul>
            <img src="{{ asset('images/logo2.png') }}" class="site-logo2 d-none d-lg-block" alt="Richter Junior Competition">
            <ul class="navbar-nav nav-auth mb-lg-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" data-bs-toggle="dropdown">{{ app()->getLocale() }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item @if(app()->getLocale() === 'uk') active @endif" href="{{ route('lang.switch', 'uk') }}">Українська</a></li>
                        <li><a class="dropdown-item @if(app()->getLocale() === 'en') active @endif" href="{{ route('lang.switch', 'en') }}">English</a></li>
                    </ul>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if(auth()->user()->isAdmin())
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Адмінка') }}</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('applications.my') }}">{{ __('Мої заявки') }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ __('Вийти') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Увійти') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Реєстрація') }}</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
</header>

<main>
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @yield('content')
</main>

<footer class="site-footer py-4 mt-5">
    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">
        <span>© {{ date('Y') }} Richter Junior Competition. {{ __('Усі права захищено.') }}</span>
        <div class="d-flex flex-wrap align-items-center gap-3">
            <a href="https://www.facebook.com/share/g/1DkBfKHsQQ/" class="footer-social" title="Facebook" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/richterjuniorcompetition?igsh=NXRocTJ6ZXV6azM2" class="footer-social" title="Instagram" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
            <a href="https://youtube.com/@richterjuniorcompetition?si=6YUbyaRylacHUVFT" class="footer-social" title="YouTube" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube"></i></a>
            <a href="mailto:richterschool.zt@ukr.net" class="footer-social" title="Email"><i class="bi bi-envelope"></i></a>
            <a href="{{ route('privacy') }}">{{ __('Політика конфіденційності') }}</a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
