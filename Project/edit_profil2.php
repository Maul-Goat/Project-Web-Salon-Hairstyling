<?php 
session_start(); 
include "koneksi.php"; 

$user_id = $_SESSION['user_id']; 
$query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_id'"); 
$data = mysqli_fetch_assoc($query); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
    body {
        background: linear-gradient(to right, #dbeafe, #f0f4ff);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0; 
        height: 100%; 
    }

    form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        max-width: 500px;
        width: 100%;
        text-align: center;
    }

    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .btn {
        width: 48%;
        margin: 5px 1%;
    }

    a {
        text-decoration: none;
    }

    .beranda {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        color: #3498db;
        font-weight: bold;
    }
    </style> 
</head>
<body>
<div class="wrapper d-flex flex-column min-vh-100">
    <main class="flex-grow-1 d-flex justify-content-center align-items-center">
    <div>
    <h2 class="text-center">Edit Profil Pengguna</h2><br> 

    <?php 
        if (isset($_SESSION['flash_message'])) {
            $msg = $_SESSION['flash_message']; 
            if (is_array($msg)) {
                echo "<p style='color: green;'>" . implode(', ', $msg) . "</p>"; 
            } else {
                echo "<p style='color: green;'>$msg</p>"; 
            }
            unset($_SESSION['flash_message']); 
        }

        if (isset($_SESSION['edit_error'])) {
            echo "<ul style='color: red;'>"; 
            foreach ($_SESSION['edit_error'] as $error) {
                echo "<li>$error</li>"; 
            }
            echo "</ul>"; 
            unset($_SESSION['edit_error']); 
        }
    ?> 

    <form action="proses_edit_profil.php" method="POST"> 
        <label>Email :</label><br>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Masukkan Email Baru" required><br>
        <label>Password :</label><br>
        <input type="password" name="password_baru" placeholder="Masukkan Password Baru (Opsional)"><br>
            <br><button type="submit" class="btn btn-dark" name="update">Update</button> 
            <p><a class="beranda" href="index3.php">Kembali ke Beranda</a></p>
    </form> 
    </div> 
    </main> 

    <!-- Footer -->
    <footer class="text-center p-4 bg-dark text-white mt-auto">
        <p>&copy; 2025 SalonKu. All Rights Reserved.</p>
    </footer>
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>