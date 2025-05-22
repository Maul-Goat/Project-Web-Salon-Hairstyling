<?php
session_start(); 

if (!isset($_SESSION['message'])) {
    header("Location: index.php");
    exit;
}

$message = $_SESSION['message'];
$detail = isset($_SESSION['booking_detail']) ? $_SESSION['booking_detail'] : [];

unset($_SESSION['message'], $_SESSION['booking_detail']);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333; 
        } 

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
        } 
        
        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px; 
        }
        
        td, th {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }
        
        th {
            background-color: #f0f0f0;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #2980b9;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            color: white;
            font-size: 14px;
        }

        table, th, td {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2><?php echo htmlspecialchars($message); ?></h2>

    <?php if (!empty($detail)): ?>
        <table>
            <tr>
                <th>Field</th>
                <th>Isi</th>
            </tr>
            <?php foreach ($detail as $label => $value): ?>
                <tr>
                    <td><?php echo htmlspecialchars($label); ?></td>
                    <td><?php echo htmlspecialchars($value); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><a href="index2.php">Kembali ke Beranda</a></p> 
    </div>
    
    <!-- Footer -->
    <footer class="text-center p-4 bg-dark text-white mt-5">
        <p>&copy; 2025 SalonKu. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>