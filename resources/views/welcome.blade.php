<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PLN') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <style>
        body {
            background: linear-gradient(to right, #f9f9f9, #e0f0ff);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .hexagon-bg {
            background: #f2f2f2;
            clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
            width: 200px;
            height: 200px;
            position: absolute;
            left: 20px;
            top: 100px;
            background: linear-gradient(135deg, #f5e4e7, #f5f9ff);
            opacity: 0.5;
        }
        .main-content {
            flex: 1;
            padding-top: 100px;
            text-align: center;
        }
        .btn-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .search-bar {
            margin-top: 50px;
        }
        footer {
            background-color: #0d6efd;
            color: rgb(255, 255, 255);
            padding: 35px 0;
            text-align: center;
        }
        .text-primary-dark {
            color: #084298 !important;
        }
    </style>
</head>
<body>
    <!-- Hexagon background -->
    <div class="hexagon-bg"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">Perusahaan Listrik Negara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">Masuk</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">Daftar</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <section class="main-content">
        <h2 class="fw-bold mb-3 text-primary-dark">Listrik Untuk Kehidupan Yang Lebih Baik<br><span class="text-primary">Cek Tagihan Listrik</span></h2>

        <div class="container mt-5">
            <img src="build/assets/electric.png" class="img-fluid" alt="Electric illustration">

            <!-- Circle Buttons -->
            <div class="row justify-content-center mt-5">
                <div class="col-6 col-md-3 text-center mb-4 text-primary-dark">
                    <div class="btn-circle">
                        <i class="fas fa-file-invoice-dollar fa-2x" style="color: #0d6efd;"></i>
                    </div>
                    <p>Lihat Total Tagihan</p>
                </div>
                <div class="col-6 col-md-3 text-center mb-4 text-primary-dark">
                    <div class="btn-circle">
                        <i class="fas fa-shield-alt fa-2x" style="color: #0d6efd;"></i>
                    </div>
                    <p>Hindari Denda</p>
                </div>
                <div class="col-6 col-md-3 text-center mb-4 text-primary-dark">
                    <div class="btn-circle">
                        <i class="fas fa-chart-line fa-2x" style="color: #0d6efd;"></i>
                    </div>
                    <p>Pantau Pemakaian</p>
                </div>
                <div class="col-6 col-md-3 text-center mb-4 text-primary-dark">
                    <div class="btn-circle">
                        <i class="fas fa-question-circle fa-2x" style="color: #0d6efd;"></i>
                    </div>
                    <p>Klarifikasi Tagihan</p>
                </div>
            </div>

            <!-- Search bar -->
            <div class="search-bar mt-5 mb-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="ID Pelanggan">
                    <button class="btn btn-primary" type="button">CEK</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2025 Ujikom Project. For educational use only.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
