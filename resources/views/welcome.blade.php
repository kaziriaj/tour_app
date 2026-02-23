<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tour Gallery</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') center/cover no-repeat;
            height: 80vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        footer {
            background: #212529;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">TourGallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Countries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('login'))

                                @auth
                                    <a href="{{ url('/dashboard') }}" class="nav-link btn btn-warning ms-2 px-3">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="nav-link btn btn-warning ms-2 px-3">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}"
                                            class="nav-link btn btn-warning ms-2 px-3">
                                            Register
                                        </a>
                                        </li>
                                    @endif
                                @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay">
            <h1 class="display-4">Explore Beautiful Countries</h1>
            <p class="lead">Nepal • India • Bhutan • Sri Lanka</p>
            <a href="#" class="btn btn-warning btn-lg">View Gallery</a>
        </div>
    </section>

    <!-- Country Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Popular Destinations</h2>

        <div class="row">

            <!-- Nepal -->
            <div class="col-md-3">
                <div class="card shadow">
                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Nepal</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm">View Photos</a>
                    </div>
                </div>
            </div>

            <!-- India -->
            <div class="col-md-3">
                <div class="card shadow">
                    <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">India</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm">View Photos</a>
                    </div>
                </div>
            </div>

            <!-- Bhutan -->
            <div class="col-md-3">
                <div class="card shadow">
                    <img src="https://images.unsplash.com/photo-1605379399642-870262d3d051" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bhutan</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm">View Photos</a>
                    </div>
                </div>
            </div>

            <!-- Sri Lanka -->
            <div class="col-md-3">
                <div class="card shadow">
                    <img src="https://images.unsplash.com/photo-1589308078056-fc7d9b70c19e" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sri Lanka</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm">View Photos</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- About Section -->
    <div class="container mt-5 text-center">
        <h2>About This App</h2>
        <p class="mt-3">
            This tour gallery app allows you to explore beautiful travel photos.
            Register, login, like photos, and share your happy feelings through comments.
        </p>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>© 2026 Tour Gallery App | All Rights Reserved</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
