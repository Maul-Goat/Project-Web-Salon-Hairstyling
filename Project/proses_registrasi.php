<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    // Validasi input
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // Cek apakah email sudah digunakan
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $check_email);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Email already exists";
    }

    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $query = "INSERT INTO users (name, email, password, dob, gender)
                  VALUES ('$name', '$email', '$hashed_password', '$dob', '$gender')";

        if (mysqli_query($connect, $query)) {
            $_SESSION['flash_message'] = [
                'type' => 'success',
                'message' => 'Registration successful! You can now login.'
            ];
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['flash_message'] = [
                'type' => 'danger',
                'message' => 'Something went wrong. Please try again.'
            ];
            header("Location: registrasi.php");
            exit();
        }
    } else {
        // Simpan error dan inputan user ke session
        $_SESSION['registration_errors'] = $errors;
        $_SESSION['form_data'] = [
            'name' => $name,
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender
        ];
        header("Location: registrasi.php");
        exit();
    }
} else {
    header("Location: registrasi.php");
    exit();
}
?>