<?php
session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact - Salon Hairstyling</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Contact Form Section -->
<section class="container my-5">
  <h2 class="text-center mb-4">Hubungi Kami</h2>

  <?php displayFlashMessage(); ?>
  
  <!-- Display booking errors if any -->
  <?php if(isset($_SESSION['booking_errors'])): ?>
    <div class="alert alert-danger">
      <ul class="mb-0">
        <?php foreach($_SESSION['booking_errors'] as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php unset($_SESSION['booking_errors']); ?>
  <?php endif; ?>

  <form action="proses_booking.php" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label"><b>Nama</b></label>
      <input type="text" class="form-control" name="nama" id="name" placeholder="Nama Lengkap" required>
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label"><b>No HP</b></label>
      <input type="tel" class="form-control" id="phone" name="phone" placeholder="No HP Aktif" required>
    </div>

    <!-- [] = array -->
    <div class="mb-3">
      <label class="form-label"><b>Jenis Kelamin</b></label>
        <div class="form-control">
          <input type="radio" name="jk[]" value="Laki-Laki"> Laki-Laki 
          <br><input type="radio" name="jk[]" value="Perempuan"> Perempuan
        </div>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label"><b>Alamat</b></label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat Rumah" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label"><b>Pilih Jenis Layanan</b></label>
        <div class="form-control">
          <input type="checkbox" name="layanan[]" value="Haircut"> Haircut 
          <br><input type="checkbox" name="layanan[]" value="Hair Coloring"> Hair Coloring 
          <br><input type="checkbox" name="layanan[]" value="Hair Treatment"> Hair Treatment 
        </div>
    </div>

    <div class="mb-3">
      <label for="booking-date" class="form-label"><b>Pilih Tanggal</b></label>
      <br><input type="date" class="form-control" name="booking_date" id="booking-date" required> 
    </div>

    <div class="mb-3">
      <label for="booking-time" class="form-label"><b>Pilih Waktu</b></label>
      <br><input type="time" class="form-control" name="booking_time" id="booking-time" required> 
    </div>

    <div class="mb-3">
      <label class="form-label"><b>Metode Pembayaran</b></label>
        <div class="form-control">
          <select id="bayar" name="bayar[]" required>
            <option value="Bayar di tempat/tunai">Bayar di tempat/tunai</option>
            <option value="Transfer bank">Transfer bank</option>
            <option value="E-wallet">E-wallet</option>
            <option value="Kartu kredit/debit">Kartu kredit/debit</option>
            <option value="QRIS">QRIS</option>
          </select>
        </div>
    </div>

    <div class="mb-3">
      <label for="message" class="form-label"><b>Catatan</b></label>
      <textarea class="form-control" id="message" name="catatan" rows="3" placeholder="Keterangan Khusus (misalnya alergi produk tertentu, preferensi gaya, dll)" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
  </form>
</section>

<!-- Footer -->
<footer class="text-center p-4 bg-dark text-white mt-5">
  <p>&copy; 2025 SalonKu. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>