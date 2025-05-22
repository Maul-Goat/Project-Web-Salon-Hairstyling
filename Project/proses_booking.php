<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['nama']);
    $phone = trim($_POST['phone']);
    $gender = isset($_POST['jk']) ? $_POST['jk'][0] : ''; 
    $address = trim($_POST['alamat']);
    $services = isset($_POST['layanan']) ? implode(", ", $_POST['layanan']) : '';
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $payment_method = isset($_POST['bayar']) ? $_POST['bayar'][0] : ''; 
    $notes = isset($_POST['catatan']) ? trim($_POST['catatan']) : '';
    
    $user_id = null;
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }
    
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Nama is required";
    }
    
    if (empty($phone)) {
        $errors[] = "No HP is required";
    }
    
    if (empty($gender)) {
        $errors[] = "Jenis Kelamin is required";
    }
    
    if (empty($address)) {
        $errors[] = "Alamat is required";
    }
    
    if (empty($services)) {
        $errors[] = "At least one service must be selected";
    }
    
    if (empty($booking_date)) {
        $errors[] = "Booking date is required";
    }
    
    if (empty($booking_time)) {
        $errors[] = "Booking time is required";
    }
    
    if (empty($payment_method)) {
        $errors[] = "Payment method is required";
    }
    
    if (empty($errors)) {
        $insert_query = "INSERT INTO bookings (user_id, name, phone, gender, address, services, booking_date, booking_time, payment_method, notes) 
                         VALUES ('$user_id', '$name', '$phone', '$gender', '$address', '$services', '$booking_date', '$booking_time', '$payment_method', '$notes')";
        
        if (mysqli_query($connect, $insert_query)) {
            $booking_id = mysqli_insert_id($connect);

            // pesan sukses + detail booking 
            $_SESSION['message'] = "Proses booking Anda berhasil! Terima kasih telah menggunakan jasa layanan kami"; 
            $_SESSION['booking_detail'] = [
                'Nama' => $name, 
                'No HP' => $phone, 
                'Jenis Kelamin' => $gender, 
                'Alamat' => $address,
                'Layanan' => $services,
                'Tanggal' => $booking_date, 
                'Waktu' => $booking_time,
                'Pembayaran' => $payment_method,
                'Catatan' => $notes 
            ]; 
            header("Location:display_message.php"); 
            exit(); 
        } else {
            $_SESSION['flash_message'] = [
                'type' => 'danger',
                'message' => "Something went wrong. Please try again."
            ];
            header("Location: booking.php");
            exit();
        }
    } else {
        $_SESSION['booking_errors'] = $errors;
        $_SESSION['booking_data'] = $_POST; 
        header("Location: booking.php");
        exit();
    }
} else {
    header("Location: booking.php");
    exit();
}
?>