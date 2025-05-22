<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    $errors = [];
    
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    
    if (empty($errors)) {
        $query = "SELECT id, name, email, password, role FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];
                
                // Redirect based on role
                if ($user['role'] == 'admin') {
                    $_SESSION['flash_message'] = [
                        'type' => 'success',
                        'message' => 'Welcome Admin! You are now logged in.'
                    ];
                    header("Location: index3.php");
                } else {
                    $_SESSION['flash_message'] = [
                        'type' => 'success',
                        'message' => 'Welcome! You are now logged in.'
                    ];
                    header("Location: index2.php");
                }
                exit();
            } else {
                // Invalid password
                $_SESSION['flash_message'] = [
                    'type' => 'danger',
                    'message' => 'Invalid email or password'
                ];
                header("Location: login.php");
                exit();
            }
        } else {
            // User not found
            $_SESSION['flash_message'] = [
                'type' => 'danger',
                'message' => 'Invalid email or password'
            ];
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_errors'] = $errors;
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>