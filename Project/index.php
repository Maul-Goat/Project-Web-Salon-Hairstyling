<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Salon Hairstyling</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="style1.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">SalonKu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a href="login.php" class="btn btn-outline-primary" id="btn">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section text-center">
  <div class="container">
    <h1 class="display-4 fw-bold">Tampil Lebih Percaya Diri!</h1>
    <p class="lead mb-4">Salon Hairstyling terbaik untuk segala acara</p>
    <a href="#services" class="btn btn-primary btn-lg">Lihat Layanan</a>
  </div>
</section>

<!-- Features -->
<section class="features py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-medal feature-icon"></i>
          <h3>Stylist Profesional</h3>
          <p>Tim ahli dengan pengalaman internasional</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-star feature-icon"></i>
          <h3>Produk Premium</h3>
          <p>Hanya menggunakan produk berkualitas tinggi</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <i class="fas fa-heart feature-icon"></i>
          <h3>Kepuasan #1</h3>
          <p>Pelayanan yang mengutamakan kenyamanan Anda</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services -->
<section id="services" class="container my-5 services-section">
  <h2 class="section-title text-center mb-5">Layanan Unggulan Kami</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 text-center service-card">
        <div class="service-icon">
          <i class="fas fa-cut"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title">Haircut</h5>
          <p class="card-text">Potongan rambut stylish dan sesuai tren dengan teknik terkini.</p>
          <p class="service-price">Mulai Rp 85.000</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 text-center service-card">
        <div class="service-icon">
          <i class="fas fa-palette"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title">Hair Coloring</h5>
          <p class="card-text">Warna rambut premium dengan hasil tahan lama dan berkilau.</p>
          <p class="service-price">Mulai Rp 350.000</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 text-center service-card">
        <div class="service-icon">
          <i class="fas fa-spa"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title">Hair Treatment</h5>
          <p class="card-text">Perawatan rambut rusak agar kembali sehat dan bernutrisi.</p>
          <p class="service-price">Mulai Rp 200.000</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Gallery -->
<section id="gallery" class="container my-5">
  <h2 class="section-title text-center mb-5">Galeri Hasil Karya</h2>
  
  <div class="gallery-container">
    <div class="gallery-track">
      <!-- All photos in sequence -->
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/f3/b7/26/f3b7267866a63a2f48407d1f4dbd79ab.jpg" alt="Gallery 1">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/236x/fc/00/d6/fc00d661ac3d8c2aff3b8a1e753268d5.jpg" alt="Gallery 2">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/94/a6/69/94a6691324824d6475b80d5726a53537.jpg" alt="Gallery 3">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/71/6f/5d/716f5d4ed5063966379a8e44fb6dcf1a.jpg" alt="Gallery 4">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/45/07/7a/45077acea325a0798de63fa905c9366b.jpg" alt="Gallery 5">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/d5/65/a5/d565a59d29c5f9f2cfb608a6307fda50.jpg" alt="Gallery 6">
      </div>
      <!-- Duplicates for seamless effect -->
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/f3/b7/26/f3b7267866a63a2f48407d1f4dbd79ab.jpg" alt="Gallery 1">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/236x/fc/00/d6/fc00d661ac3d8c2aff3b8a1e753268d5.jpg" alt="Gallery 2">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/94/a6/69/94a6691324824d6475b80d5726a53537.jpg" alt="Gallery 3">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/71/6f/5d/716f5d4ed5063966379a8e44fb6dcf1a.jpg" alt="Gallery 4">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/45/07/7a/45077acea325a0798de63fa905c9366b.jpg" alt="Gallery 5">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/d5/65/a5/d565a59d29c5f9f2cfb608a6307fda50.jpg" alt="Gallery 6">
      </div>
    </div>
  </div>
  
  <div class="text-center mt-4">
    <a href="gallery.php" class="btn btn-outline-primary">Lihat Semua Galeri</a>
  </div>
</section>

<!-- Testimonial -->
<section class="testimonial-section py-5">
  <div class="container">
    <h2 class="section-title text-center mb-5">Apa Kata Mereka</h2>
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="testimonial-card">
          <div class="testimonial-text">
            "Sangat puas dengan hasil coloring di SalonKu. Warnanya persis seperti yang saya inginkan dan rambut tetap sehat. Stylist-nya ramah dan profesional!"
          </div>
          <div class="testimonial-author">
            <div class="testimonial-name">Dina Safitri</div>
            <div class="testimonial-stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="cta-section text-center py-5">
  <div class="container">
    <h2 class="mb-4">Siap untuk Tampil Beda?</h2>
    <p class="lead mb-4">Booking sekarang dan dapatkan diskon 15% untuk pelanggan baru</p>
    <a href="login.php" class="btn btn-primary btn-lg">Booking Sekarang</a>
  </div>
</section>

<!-- Footer -->
<footer class="text-center p-4 bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <h5>SalonKu</h5>
        <p>Membuat Anda tampil lebih percaya diri sejak 2099</p>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <h5>Kontak</h5>
        <p><i class="fas fa-map-marker-alt me-2"></i>Ngawi</p>
        <p><i class="fas fa-phone me-2"></i>+62 123-456-7890</p>
      </div>
      <div class="col-md-4">
        <h5>Jam Operasional</h5>
        <p>Senin - Sabtu: 09.00 - 20.00</p>
        <p>Minggu: 10.00 - 17.00</p>
      </div>
    </div>
    <div class="mt-4">
      <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
    </div>
    <div class="mt-4">
      <p>&copy; 2025 SalonKu. All Rights Reserved.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>