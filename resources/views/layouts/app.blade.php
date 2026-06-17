<!DOCTYPE html>
<html lang="ук" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerTrack - @yield('title', 'Тренування')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; 
            color: #212529; 
        }
        /* Light card style */
        .pt-card-white {
            background-color: #ffffff !important;
            color: #212529 !important;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(16, 24, 40, 0.06);
            transition: transform 0.12s ease, box-shadow 0.12s ease;
        }
        .pt-card-white:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(16, 24, 40, 0.08);
        }
        .text-muted-dark {
            color: #6c757d !important;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
        }
        .navbar .navbar-brand, .navbar .nav-link {
            color: #212529 !important;
        }
        .navbar .nav-link:hover {
            color: #0d6efd !important;
        }

        .btn-primary-custom {
            background-color: #343a40;
            color: #ffffff;
            border: 1px solid #343a40;
        }
        .btn-primary-custom:hover {
            background-color: #23272b;
            border-color: #23272b;
        }
        .btn-outline-custom {
            background-color: transparent;
            color: #495057;
            border: 1px solid #ced4da;
        }
        .btn-outline-custom:hover {
            background-color: #f1f3f5;
            color: #212529;
            border-color: #adb5bd;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase tracking-wider" href="{{ route('home') }}">
                 Power<span class="text-primary">Track</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" href="{{ route('dashboard') }}">Дашборд</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('exercises.index') }}">Вправи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('workouts.index') }}">Статистика</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Увійти</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Панель</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Вийти</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <style>

        .navbar {
            position: relative;
            z-index: 99999999 !important;
        }
        .navbar .nav-link {
            pointer-events: auto !important;
        }
    </style>

    <script>
        // Simple click logger for debugging navbar clicks
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.navbar a.nav-link, .navbar .navbar-brand').forEach(function (el) {
                el.addEventListener('click', function (e) {
                    console.info('Navbar click:', e.currentTarget.href || e.currentTarget.textContent.trim());
                });
            });
        });
    </script>

    <main class="container my-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>