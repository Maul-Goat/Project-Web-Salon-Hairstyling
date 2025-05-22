<?php 
    session_start(); 
    include "koneksi.php"; 

    $user_id = $_SESSION['user_id']; 
    $email = trim($_POST['email']); 
    $password_baru = trim($_POST['password_baru']); 

    $error = []; 

    // validasi email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid, silahkan coba lagi!"; 
    }

    // mengecek email sudah digunakan oleh user lain atau belum 
    $cek_email = mysqli_query($connect, "SELECT id FROM users WHERE email='$email' AND id != '$user_id'"); 
    if (mysqli_num_rows($cek_email) > 0) {
        $error[] = "Email sudah digunakan oleh pengguna yang lain"; 
    }

    if (!empty($error)) {
        $_SESSION['edit_error'] = $error; 
        header("Location:edit_profil.php"); 
        exit; 
    }

    if (!empty($password_baru)) {
        $hashed = password_hash($password_baru, PASSWORD_DEFAULT); 
        $query = "UPDATE users SET email='$email', password='$hashed' WHERE id='$user_id'"; 
    } else {
        $query = "UPDATE users SET email='$email' WHERE id='$user_id'"; 
    } 

    if (mysqli_query($connect, $query)) {
        $_SESSION['flash_message'] = "Profil Anda berhasil diperbarui"; 
    } else {
        $_SESSION['flash_message'] = "Terjadi kesalahan saat menyimpan perubahan"; 
    }

    header("Location:edit_profil.php"); 
    exit; 
?> 