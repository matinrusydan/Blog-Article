<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOTO BUZZ - Blog Otomotif Indonesia</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF5A00;    /* Bright orange - energetic, powerful */
            --secondary-color: #212529;  /* Dark gray/black - bold, serious */
            --third-color: #D10000;      /* Dark red - aggressive, sporty */
            --light-color: #FFFFFF;
        }
        
        body {
            font-family: 'Rajdhani', 'Segoe UI', sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }
        
        .navbar {
            background-color: var(--secondary-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 800;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.5rem;
        }
        
        .navbar-brand span {
            color: var(--third-color);
        }
        
        .nav-link {
            color: white !important;
            font-weight: 600;
            margin: 0 10px;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: all 0.3s;
            padding: 8px 15px !important;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary-color) !important;
            background-color: rgba(255,255,255,0.1);
            border-radius: 3px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 8px 22px;
            border-radius: 3px;
        }
        
        .btn-primary:hover {
            background-color: #e65100;
            border-color: #e65100;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            border-width: 2px;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-third {
            background-color: var(--third-color);
            border-color: var(--third-color);
            color: white;
        }
        
        .btn-third:hover {
            background-color: #b10000;
            border-color: #b10000;
            color: white;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
            position: relative;
            overflow: hidden;
            color: white;
            padding: 5rem 0;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/api/placeholder/1200/600');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(to right, #ff4d4d, #ff9966);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1.5rem;
            text-shadow: 0 0 20px rgba(255,77,77,0.2);
            letter-spacing: -1px;
            display: inline-block;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            font-weight: 400;
            margin-bottom: 2rem;
            max-width: 700px;
        }

        .btn-primary {
            background: linear-gradient(to right, #ff4d4d, #ff9966);
            border: none;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(255, 77, 77, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 77, 77, 0.4);
            background: linear-gradient(to right, #ff3333, #ff8050);
        }

        .btn-third {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-third:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-3px);
        }

        .car-icon {
            animation: float 3s ease-in-out infinite;
            font-size: 2.5rem;
            margin-right: 15px;
            color: #ff9966;
        }

        .stats-row {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #ff9966;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-section {
                padding: 3rem 0;
            }
        }

        .card {
            border: none;
            transition: all 0.3s;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 5px;
            overflow: hidden;
            background-color: white;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.15);
        }
        
        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: all 0.5s;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .card-body {
            position: relative;
            padding-top: 25px;
        }
        
        .card-title {
            color: #333;
            font-weight: 600;
        }
        
        .card-title a {
            color: #333;
            text-decoration: none;
        }
        
        .card-title a:hover {
            color: var(--primary-color);
        }
        
        .card-text {
            color: #666;
        }
        
        .blog-meta {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .blog-meta i {
            color: var(--primary-color);
            margin-right: 5px;
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .pagination .page-link {
            color: var(--primary-color);
        }
        
        footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 40px 0;
        }
        
        footer h5 {
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        footer h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        footer ul li {
            margin-bottom: 10px;
        }
        
        footer a {
            transition: all 0.3s;
            position: relative;
            display: inline-block;
        }
        
        footer a:hover {
            color: var(--primary-color) !important;
            transform: translateX(5px);
        }
        
        .social-links a {
            color: white;
            background-color: rgba(255,255,255,0.1);
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 3px;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .category-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 0;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        }
        
        .category-badge.racing {
            background-color: var(--third-color);
        }
        
        .category-badge.review {
            background-color: #007BFF;
        }
        
        .category-badge.tips {
            background-color: #28a745;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">MOTO<span>BUZZ</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Modifikasi</a>
                    </li>
                </ul>
                <div class="ms-3">
                    <a href="#" class="btn btn-primary"><i class="fas fa-search me-2"></i>Cari</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
   <section class="hero-section">
        <div class="container hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="hero-title">
                        <i class="fas fa-car-side car-icon"></i>DUNIA OTOMOTIF INDONESIA
                    </h1>
                    <p class="hero-subtitle mx-auto">
                        Jelajahi informasi terkini seputar dunia otomotif, ulasan mendalam kendaraan terbaru, tips perawatan profesional, dan inspirasi modifikasi yang akan mengubah cara Anda melihat kendaraan.
                    </p>
                    <div class="mt-4 d-flex flex-wrap justify-content-center gap-3">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-newspaper me-2"></i>Artikel Terbaru
                        </a>
                        <a href="#" class="btn btn-third">
                            <i class="fas fa-video me-2"></i>Video Review
                        </a>
                    </div>
                    
                    <div class="row stats-row">
                        <div class="col-md-4 stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Artikel</div>
                        </div>
                        <div class="col-md-4 stat-item">
                            <div class="stat-number">350+</div>
                            <div class="stat-label">Review Mobil</div>
                        </div>
                        <div class="col-md-4 stat-item">
                            <div class="stat-number">100K+</div>
                            <div class="stat-label">Pembaca</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section id="blog" class="py-5 bg-light">
        <div class="container">
          <h2 class="text-center mb-5">Artikel Terbaru</h2>
          <div class="row g-4">
            <!-- Artikel 1 -->
            <div class="col-md-4">
              <div class="card h-100">
                <img src="images/Honda-Jazz.png" class="card-img-top" alt="Modifikasi Honda Jazz">
                <div class="card-body">
                  <h5 class="card-title">Modifikasi Honda Jazz: Gaya dan Performa</h5>
                  <p class="card-text">Transformasi Honda Jazz dengan body kit agresif dan peningkatan performa mesin.</p>
                  <a href="article.html" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <!-- Artikel 2 -->
            <div class="col-md-4">
              <div class="card h-100">
                <img src="images/tune-up.webp" class="card-img-top" alt="Tuning Up Motor">
                <div class="card-body">
                  <h5 class="card-title">Panduan Tuning Up Motor Harian</h5>
                  <p class="card-text">Langkah-langkah penting untuk menjaga performa motor Anda tetap optimal.</p>
                  <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <!-- Artikel 3 -->
            <div class="col-md-4">
              <div class="card h-100">
                <img src="images/offroad.jpg" class="card-img-top" alt="Modifikasi Offroad">
                <div class="card-body">
                  <h5 class="card-title">Tips Modifikasi Mobil Offroad</h5>
                  <p class="card-text">Persiapan dan modifikasi yang diperlukan untuk petualangan offroad yang aman dan seru.</p>
                  <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <!-- Artikel 4 -->
            <div class="col-md-4">
              <div class="card h-100">
                <img src="images/perawatan-mobil.jpg" class="card-img-top" alt="Perawatan Mobil">
                <div class="card-body">
                  <h5 class="card-title">Perawatan Mobil: Tips dan Trik</h5>
                  <p class="card-text">Cara merawat mobil Anda agar tetap dalam kondisi prima dan awet.</p>
                  <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <!-- Artikel 5 -->
            <div class="col-md-4">
              <div class="card h-100">
                <img src="images/inovasi-teknologi.webp" class="card-img-top" alt="Teknologi Otomotif">
                <div class="card-body">
                  <h5 class="card-title">Inovasi Teknologi di Dunia Otomotif</h5>
                  <p class="card-text">Mengenal teknologi terbaru yang mengubah cara kita berkendara.</p>
                  <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <!-- Artikel 6 -->
            <div class="col-md-4">
              <div class="card h-100">
                <img src="images/motor-klasik.jpg" class="card-img-top" alt="Modifikasi Motor">
                <div class="card-body">
                  <h5 class="card-title">Inspirasi Modifikasi Motor Klasik</h5>
                  <p class="card-text">Ide-ide kreatif untuk mengubah motor klasik menjadi lebih menarik dan unik.</p>
                  <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
          <div class="row">
            <!-- Kolom 1: Tentang Kami -->
            <div class="col-md-3">
              <h5>Tentang Kami</h5>
              <p>Blog ini membahas dunia otomotif, mulai dari ulasan motor, tips perawatan kendaraan, hingga perkembangan teknologi terbaru di industri otomotif. Didedikasikan untuk para pecinta kendaraan roda dua dan empat, kami hadir untuk memberikan informasi yang akurat dan inspiratif.</p>
            </div>
            <!-- Kolom 2: Navigasi -->
            <div class="col-md-3">
              <h5>Navigasi</h5>
              <ul class="list-unstyled">
                <li><a href="index.html" class="text-white text-decoration-none">Home</a></li>
                <li><a href="blog.html" class="text-white text-decoration-none">Blog</a></li>
                <li><a href="#" class="text-white text-decoration-none">© 2025 Matin Rusydan</a></li>
              </ul>
            </div>
            <!-- Kolom 3: Kontak -->
            <div class="col-md-3">
              <h5>Kontak</h5>
              <ul class="list-unstyled">
                <li><a href="mailto:matin.rusydan@gmail.com" class="text-white text-decoration-none">matin.rusydan@gmail.com</a></li>
                <li><a href="tel:08123456789" class="text-white text-decoration-none">08123456789</a></li>
              </ul>
              <div class="d-flex gap-2 mt-2">
                <a href="#"><img src="images/whatsapp.png" alt="WhatsApp" width="24" height="24"></a>
                <a href="#"><img src="images/telegram.png" alt="Telegram" width="24" height="24"></a>
              </div>
            </div>
            <!-- Kolom 4: Informasi -->
            <div class="col-md-3">
              <h5>Informasi</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white text-decoration-none">Kontak Kami</a></li>
                <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                <li><a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a></li>
                <li><a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a></li>
                <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top border-secondary pt-4 mt-4 text-center">
            <p class="mb-0">© 2025 MotoBuzz. All rights reserved.</p>
          </div>
        </div>
      </footer>
      

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>