<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduKomputer - Cerdas Berteknologi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        <style>
    /* 1. Ganti warna background Navbar (Ganti #0d6efd dengan warna pilihan) */
    .navbar { 
        backdrop-filter: blur(10px); 
        background: rgba(108, 92, 231, 0.9) !important; /* Warna Ungu Modern #6c5ce7 */
    }

    /* 2. Ganti gradien pada Hero Section */
    .hero-section { 
        background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%); /* Gradien Ungu */
        padding: 100px 0;
        color: white;
        border-radius: 0 0 50px 50px;
        margin-bottom: -50px;
    }

    /* 3. Pastikan teks tombol di Navbar sesuai dengan warna tema */
    .nav-link.btn-light {
        color: #6c5ce7 !important; /* Warna teks tombol mengikuti tema */
    }
</style>
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="/" style="color: #000000 !important;">
    💻 Put's Blogspot

            <div class="navbar-nav ms-auto">
                <a class="nav-link btn btn-light text-primary px-4 fw-bold rounded-pill" href="/login">Login Admin</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container text-center">
            <p class="mb-0 opacity-75">&copy; 2026 - EduKomputer</p>
        </div>
    </footer>
</body>
</html>