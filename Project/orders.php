<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM bookings WHERE user_id = $user_id ORDER BY booking_date DESC";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .order-card {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: transform 0.2s;
        }
        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">📋 Pesanan Anda</h2>
        
        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="order-card">
                <div class="row">
                    <div class="col-md-8">
                        <h5><?= htmlspecialchars($row['services']) ?></h5>
                        <div class="text-muted mb-2">
                            <i class="fas fa-calendar me-2"></i><?= date('d M Y', strtotime($row['booking_date'])) ?>
                            <i class="fas fa-clock ms-3 me-2"></i><?= date('H:i', strtotime($row['booking_time'])) ?>
                        </div>
                        <div class="d-flex gap-2">
                            <span class="badge bg-primary"><?= htmlspecialchars($row['payment_method']) ?></span>
                            <span class="badge bg-secondary"><?= htmlspecialchars($row['gender']) ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary mt-2" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal"
                            data-details='<?= json_encode($row) ?>'>
                            <i class="fas fa-info-circle me-2"></i>Detail
                        </button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-info">
                Belum ada pesanan. Yuk booking layanan kami!
            </div>
        <?php endif; ?>
        
        <a href="index2.php" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalDetailContent">
                    <!-- Konten detail akan diisi via JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('detailModal').addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const details = JSON.parse(button.dataset.details);
            
            const content = `
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <small class="text-muted d-block mb-1">Nama</small>
                            <div class="fw-bold">${details.name}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <small class="text-muted d-block mb-1">No HP</small>
                            <div class="fw-bold">${details.phone}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <small class="text-muted d-block mb-1">Alamat</small>
                            <div class="fw-bold">${details.address}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <small class="text-muted d-block mb-1">Tanggal Booking</small>
                            <div class="fw-bold">${details.booking_date}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <small class="text-muted d-block mb-1">Waktu</small>
                            <div class="fw-bold">${details.booking_time}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <small class="text-muted d-block mb-1">Catatan</small>
                            <div class="fw-bold">${details.notes || '-'}</div>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('modalDetailContent').innerHTML = content;
        });
    </script>
</body>
</html>