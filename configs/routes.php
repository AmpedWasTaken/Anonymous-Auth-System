<?php
// Simple routing logic
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Assuming the controllers directory is at the same level as routes.php
    require_once __DIR__ . '/../controllers/UserController.php';

    switch ($action) {
        case 'register':
            UserController::register();
            break;
        case 'login':
            UserController::login();
            break;
        case 'dashboard':
            UserController::dashboard();
            break;
        case 'logout':
            UserController::logout();
            break;
        default:
            echo "404 Not Found";
            break;
    }
} else {
    // echo "Welcome to the Anonymous Auth System!";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous Auth System</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            background-color: #0f0f0f;
            color: #00ff00;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            color: #00ff00;
            background-color: #001f1f;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #003f3f;
        }
    </style>
</head>
<body>
    <!-- index.php -->
    <h2>Welcome to the Anonymous Auth System!</h2>
    <a href="?action=register">Register</a>
    <a href="?action=login">Login</a>
</body>
</html>

    <?php
}
