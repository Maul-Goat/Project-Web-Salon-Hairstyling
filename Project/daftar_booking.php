<?php 
session_start(); 
include "koneksi.php";

// Handle Delete
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    mysqli_query($connect, "DELETE FROM bookings WHERE id = $id");
    header("Location: ".$_SERVER['PHP_SELF']);
}

// Handle Update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];
    
    mysqli_query($connect, "UPDATE bookings SET 
        name = '$name',
        phone = '$phone',
        address = '$address',
        notes = '$notes'
        WHERE id = $id
    ");
    header("Location: ".$_SERVER['PHP_SELF']);
}

$query = "SELECT * FROM bookings ORDER BY booking_date ASC";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
        }

        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin-top: 50px;
            padding: 30px;
        }

        h2 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .table thead {
            background: #3498db;
            color: white;
        }

        .btn-edit {
            background: #3498db;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Booking SalonKu</h2>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="align-middle">
                <tr>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Layanan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Pembayaran</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['gender']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td><?= htmlspecialchars($row['services']) ?></td>
                    <td><?= htmlspecialchars($row['booking_date']) ?></td>
                    <td><?= htmlspecialchars($row['booking_time']) ?></td>
                    <td><?= htmlspecialchars($row['payment_method']) ?></td>
                    <td><?= htmlspecialchars($row['notes']) ?></td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn-edit" data-bs-toggle="modal" 
                            data-bs-target="#editModal" 
                            data-id="<?= $row['id'] ?>"
                            data-name="<?= htmlspecialchars($row['name']) ?>"
                            data-phone="<?= htmlspecialchars($row['phone']) ?>"
                            data-address="<?= htmlspecialchars($row['address']) ?>"
                            data-notes="<?= htmlspecialchars($row['notes']) ?>">
                            Edit
                        </button>
                        
                        <!-- Delete Form -->
                        <form method="POST" style="display:inline">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete" class="btn-delete">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <a href="index3.php" class="btn btn-outline-primary">Kembali ke Beranda</a>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" id="editName" 
                            class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>No HP</label>
                        <input type="text" name="phone" id="editPhone" 
                            class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="address" id="editAddress" 
                            class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label>Catatan</label>
                        <textarea name="notes" id="editNotes" 
                            class="form-control" rows="3"></textarea>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" 
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="update" 
                        class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Script untuk mengisi data modal edit
    document.getElementById('editModal').addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget;
        
        document.getElementById('editId').value = button.dataset.id;
        document.getElementById('editName').value = button.dataset.name;
        document.getElementById('editPhone').value = button.dataset.phone;
        document.getElementById('editAddress').value = button.dataset.address;
        document.getElementById('editNotes').value = button.dataset.notes;
    });
</script>

</body>
</html>