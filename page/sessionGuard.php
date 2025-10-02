<?php
function requireRole($role = 'customer') {
    session_start();

    // ✅ Admin access
    if ($role === 'admin' && isset($_SESSION['admin']) && $_SESSION['admin']['role'] === 'admin') {
        return true;
    }

    // ✅ Customer access (can be in either session)
    if ($role === 'customer') {
        if (isset($_SESSION['customer']) && $_SESSION['customer']['role'] === 'customer') {
            return true;
        }
        if (isset($_SESSION['admin']) && $_SESSION['admin']['role'] === 'customer') {
            return true;
        }
    }

    // ❌ Access denied — expressive splash!
    echo <<<HTML
    <style>

        .splash-denied {
            position: fixed;
            top: 10%;
            left: 35%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            animation: splash 2s ease-out forwards;
            color: #fff;
            background: radial-gradient(circle, #fab9baff, #3918f3ff);
            font-family: 'Segoe UI', sans-serif;
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px #f9d423;
        }
        @keyframes splash {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(3); opacity: 0; }
        }
    </style>
    <div class='splash-denied'>🚫 Access Denied: $role role required</div>
    <script>
        setTimeout(() => { window.location.href = '../customer/Homepage.php'; }, 1900);
    </script>
    HTML;
    exit;
}