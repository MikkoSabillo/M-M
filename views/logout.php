<?php
session_start();

// Role-aware logout
$role = $_GET['role'] ?? '';

if ($role === 'admin' && isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
} elseif ($role === 'customer' && isset($_SESSION['customer'])) {
    unset($_SESSION['customer']);
}

// Optional: destroy session if both are gone
if (!isset($_SESSION['admin']) && !isset($_SESSION['customer'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging Out...</title>
    <style>
        body {
            margin-top: 100px;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
        }
        .logout-message {
            font-size: 2rem;
            color: white;
            background: linear-gradient(to right, #f1a5a6ff, #3823f9ff);
            padding: 1rem 2rem;
            border-radius: 12px;
            box-shadow: 0 0 20px #fff;
            animation: fadeOut 1.5s ease forwards;
        }
        @keyframes fadeOut {
            0% { opacity: 1; transform: scale(1); }
            100% { opacity: 0; transform: scale(1.5); }
        }
    </style>
</head>
<body>
    <div class="logout-message">👋 You’ve been logged out successfully!</div>
    <script>
        setTimeout(() => {
            window.location.href = '../index.php';
        }, 1500);
    </script>
</body>
</html>