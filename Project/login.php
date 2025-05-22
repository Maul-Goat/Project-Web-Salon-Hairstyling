<?php
session_start();
include 'functions.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Your Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6c63ff;
            --secondary-color: #f5f5f5;
            --text-color: #333;
            --shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background: linear-gradient(135deg, #a47eeb, #7597de);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 15px 0;
        }
        
        .login-card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            background-color: white;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .login-img {
            height: 100%;
            object-fit: cover;
            min-height: 400px;
        }
        
        .brand-logo {
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.3rem;
        }
        
        .brand-icon {
            background: linear-gradient(135deg, #6c63ff, #a47eeb);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 10px 12px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.15rem rgba(108, 99, 255, 0.25);
        }
        
        .form-floating label {
            padding-left: 12px;
            font-size: 0.85rem;
        }
        
        .login-btn {
            background: linear-gradient(135deg, #6c63ff, #a47eeb);
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .login-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(108, 99, 255, 0.3);
        }
        
        .links a {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .links a:hover {
            color: #5046e5;
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 0.85rem;
        }
        
        .form-check-label, .small {
            font-size: 0.8rem;
        }
        
        @media (max-width: 768px) {
            .login-card {
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="login-card">
            <div class="row g-0">
                <!-- Image Column -->
                <div class="col-md-5 d-none d-md-block">
                    <img src="https://i.pinimg.com/736x/15/27/e7/1527e75c2aca71336b3fe9553a0b8a06.jpg"
                    alt="login form" class="login-img img-fluid" />
                </div>
                
                <!-- Form Column -->
                <div class="col-md-7 p-3 p-md-4">
                    <!-- Flash Messages -->
                    <?php displayFlashMessage(); ?>
                    
                    <!-- Login Errors -->
                    <?php if(isset($_SESSION['login_errors'])): ?>
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0 small">
                                <?php foreach($_SESSION['login_errors'] as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php unset($_SESSION['login_errors']); ?>
                    <?php endif; ?>
                    
                    <!-- Login Form -->
                    <div class="d-flex align-items-center mb-3">
                        <div class="brand-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="brand-logo ms-2">YourBrand</span>
                    </div>
                    
                    <h5 class="mb-3 text-secondary">Welcome Back!</h5>
                    
                    <form action="proses_login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                            <label for="email"><i class="fas fa-envelope me-2"></i>Email address</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#!" class="text-primary small">Forgot password?</a>
                        </div>
                        
                        <button type="submit" class="login-btn btn btn-primary w-100 mb-3">
                            Sign In <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                        
                        <div class="text-center links">
                            <p class="mb-2 small">Don't have an account? <a href="registrasi.php" class="fw-bold">Register here</a></p>
                            <div class="d-flex justify-content-center gap-3 small text-secondary">
                                <a href="#!">Terms of use</a>
                                <span>|</span>
                                <a href="#!">Privacy policy</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>