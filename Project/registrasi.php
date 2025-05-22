<?php
session_start();
include 'functions.php';

// Get form data from session if exists
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [
    'name' => '',
    'email' => '',
    'dob' => '',
    'gender' => ''
];

// Clear form data from session
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Your Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6c63ff;
            --secondary-color: #f5f5f5;
            --text-color: #333;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background: linear-gradient(135deg, #a47eeb, #7597de);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .register-card {
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            background-color: white;
        }
        
        .register-img {
            height: 100%;
            object-fit: cover;
        }
        
        .brand-logo {
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .brand-icon {
            background: linear-gradient(135deg, #6c63ff, #a47eeb);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            padding: 10px 12px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
        }
        
        .form-floating label {
            padding-left: 12px;
        }
        
        .register-btn {
            background: linear-gradient(135deg, #6c63ff, #a47eeb);
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 99, 255, 0.3);
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
            border-radius: 10px;
        }
        
        .form-label {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 0.2rem;
            margin-top: 0.2rem;
            font-weight: 500;
        }
        
        /* Custom styles for date input */
        input[type="date"] {
            color: #495057;
        }
        
        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c63ff' class='bi bi-calendar' viewBox='0 0 16 16'%3E%3Cpath d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/%3E%3C/svg%3E");
        }
        
        /* Password strength indicator */
        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <section class="min-vh-100 d-flex align-items-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="register-card">
                        <div class="row g-0">
                            <!-- Image Column -->
                            <div class="col-md-5 d-none d-md-block">
                                <img src="https://i.pinimg.com/736x/15/27/e7/1527e75c2aca71336b3fe9553a0b8a06.jpg"
                                    alt="register form" class="register-img img-fluid h-100" />
                            </div>
                            
                            <!-- Form Column -->
                            <div class="col-md-7 p-4">
                                <!-- Flash Messages -->
                                <?php displayFlashMessage(); ?>
                                
                                <!-- Registration Errors -->
                                <?php if(isset($_SESSION['registration_errors'])): ?>
                                    <div class="alert alert-danger mb-3 shadow-sm">
                                        <ul class="mb-0">
                                            <?php foreach($_SESSION['registration_errors'] as $error): ?>
                                                <li><?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php unset($_SESSION['registration_errors']); ?>
                                <?php endif; ?>
                                
                                <!-- Registration Form -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="brand-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <span class="brand-logo ms-2 fs-4">Create Account</span>
                                </div>
                                
                                <p class="text-secondary mb-3">Join our community today</p>
                                
                                <form action="proses_registrasi.php" method="POST">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="registerName" class="form-label">
                                                <i class="fas fa-user me-1"></i> Username
                                            </label>
                                            <input type="text" id="registerName" name="nama" 
                                                class="form-control" 
                                                value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>"
                                                required/>
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <label for="registerEmail" class="form-label">
                                                <i class="fas fa-envelope me-1"></i> Email
                                            </label>
                                            <input type="email" id="registerEmail" name="email" 
                                                class="form-control" 
                                                value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>"
                                                required/>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="registerDob" class="form-label">
                                                <i class="fas fa-calendar me-1"></i> Date of Birth
                                            </label>
                                            <input type="date" id="registerDob" name="dob" 
                                                class="form-control" 
                                                value="<?php echo htmlspecialchars($form_data['dob'] ?? ''); ?>"
                                                required/>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="registerGender" class="form-label">
                                                <i class="fas fa-venus-mars me-1"></i> Gender
                                            </label>
                                            <select id="registerGender" name="gender" class="form-select" required>
                                                <option value="" disabled <?php echo empty($form_data['gender']) ? 'selected' : ''; ?>>Select Gender</option>
                                                <option value="male" <?php echo isset($form_data['gender']) && $form_data['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
                                                <option value="female" <?php echo isset($form_data['gender']) && $form_data['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
                                                <option value="other" <?php echo isset($form_data['gender']) && $form_data['gender'] == 'other' ? 'selected' : ''; ?>>Other</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="registerPassword" class="form-label">
                                                <i class="fas fa-lock me-1"></i> Password
                                            </label>
                                            <input type="password" id="registerPassword" name="password" 
                                                class="form-control" 
                                                oninput="checkPasswordStrength(this.value)"
                                                required/>
                                            <div class="password-strength w-100 bg-light" id="passwordStrength"></div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="registerConfirmPassword" class="form-label">
                                                <i class="fas fa-check-circle me-1"></i> Confirm Password
                                            </label>
                                            <input type="password" id="registerConfirmPassword" name="confirm_password" 
                                                class="form-control" 
                                                oninput="checkPasswordMatch()"
                                                required/>
                                            <div class="invalid-feedback" id="passwordMatchFeedback">
                                                Passwords don't match
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                        <label class="form-check-label small" for="agreeTerms">
                                            I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                        </label>
                                    </div>
                                    
                                    <button type="submit" class="register-btn btn btn-primary w-100 mb-3">
                                        Create Account <i class="fas fa-arrow-right ms-1"></i>
                                    </button>
                                    
                                    <div class="text-center links">
                                        <p class="small mb-3">Already have an account? <a href="login.php" class="fw-bold">Login here</a></p>
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
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple password strength indicator
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('passwordStrength');
            let strength = 0;
            
            if (password.length > 6) strength += 1;
            if (password.length > 10) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            const colors = ['#dc3545', '#ffc107', '#17a2b8', '#28a745', '#6c63ff'];
            const widths = ['20%', '40%', '60%', '80%', '100%'];
            
            if (password.length === 0) {
                strengthBar.style.width = '0%';
                strengthBar.style.backgroundColor = 'transparent';
            } else {
                strengthBar.style.width = widths[strength];
                strengthBar.style.backgroundColor = colors[strength];
            }
        }
        
        // Password match check
        function checkPasswordMatch() {
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword');
            const feedback = document.getElementById('passwordMatchFeedback');
            
            if (password !== confirmPassword.value && confirmPassword.value !== '') {
                confirmPassword.classList.add('is-invalid');
                feedback.style.display = 'block';
            } else {
                confirmPassword.classList.remove('is-invalid');
                feedback.style.display = 'none';
            }
        }
    </script>
</body>
</html>