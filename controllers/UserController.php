<?php
class UserController {
    public static function register() {
        // Handle user registration logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = hash('sha256', $_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => PASSWORD_COST]);

            // Check if there are any existing users
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $stmt = $pdo->query("SELECT COUNT(*) FROM users");
            $userCount = $stmt->fetchColumn();
            
            $role = ($userCount == 0) ? password_hash('admin', PASSWORD_BCRYPT) : password_hash('user', PASSWORD_BCRYPT);
            
            // Store user data in the database (PDO example)
            $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
            $stmt->execute([$username, $password, $role]);

            echo "Registration successful!";
        } else {
            // Display registration form
            include __DIR__ . '/../views/register_form.php';
        }
    }

    public static function login() {
        // Handle user login logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Hash the provided username to compare with the hashed username in the database
            $usernameHashed = hash('sha256', $username);

            // Retrieve user data from the database (PDO example)
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$usernameHashed]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // get the role from the database
            $role = $user['role'];

            if (password_verify("admin", $role)  && $user && password_verify($password, $user['password'])) {
                // Successful login, set a session or token
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;
                $_SESSION['role'] = 'admin';
                include __DIR__ . '/../views/dashboard.php';
            } else if ($user && password_verify($password, $user['password'])) {
                // Successful login, set a session or token
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;
                $_SESSION['role'] = 'user';
                include __DIR__ . '/../views/dashboard.php';
            } else {
                echo "Invalid username or password.";
            }
        } else {
            // Display login form
            include __DIR__ . '/../views/login_form.php';
        }
    }

    public static function logout() {
        // Handle user logout logic
        session_destroy();
        header("Location: ?action=login");
    }

    public static function dashboard() {
        // Handle user dashboard logic
        if (isset($_SESSION['user_id'])) {
            // User is authenticated, display dashboard content
            echo "Welcome to the Dashboard!";
        } else {
            // User is not authenticated, redirect to login
            header("Location: ?action=login");
        }
    }
}
