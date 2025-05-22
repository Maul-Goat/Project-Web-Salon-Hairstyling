<?php 
    include "koneksi.php"; 
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email'])) {
            $email = mysqli_real_escape_string($connect, $_POST['email']); 
            $query = "DELETE FROM users WHERE email = '$email'"; 
            $result = mysqli_query($connect, $query); 

            if ($result) {
                if (mysqli_affected_rows($connect) > 0) {
                    $message = "<div class='alert alert-success'>Akun dengan email <strong>$email</strong> berhasil dihapus!</div>";
                } else {
                    $message = "<div class='alert alert-warning'>Akun dengan email <strong>$email</strong> tidak ditemukan!</div>";
                }
            } else {
                $message = "<div class='alert alert-danger'>Gagal menghapus akun: " . mysqli_error($connect) . "</div>";
            }
        } else {
            $message = "<div class='alert alert-warning'>Email tidak dikirim!</div>"; 
        }
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
    }

    form {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        text-align: center;
    }

    input[type="email"] {
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
    </style>
</head>
<body>
<main class="d-flex justify-content-center align-items-center flex-grow-1">
<form method="POST" action="">
    <?php if (!empty($message)) echo $message; ?>
    <br><input type="email" name="email" placeholder="Masukkan email yang akan dihapus" required>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-dark">Delete</button>
        <br><a href="index3.php" class="btn btn-info">Kembali</a> 
    </div>  
</form>
</main> 

<!-- Footer -->
<footer class="text-center p-4 bg-dark text-white mt-auto">
    <p>&copy; 2025 SalonKu. All Rights Reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>