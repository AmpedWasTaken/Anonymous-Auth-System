<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($_SESSION['logged_in']): ?>
        <h2>Welcome, <?php echo $_SESSION['username'];?>!</h2>
        <p><?php echo $_SESSION['role']; ?></p>
        <a href="?action=logout">Logout</a>
    <?php else: ?>
        <h2>Welcome to the Anonymous Auth System!</h2>
        <a href="?action=register">Register</a>
        <a href="?action=login">Login</a>
    <?php endif; ?>
</body>
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
    font-size: 2.5rem;
    margin-bottom: 10px;
}

p {
    margin-bottom: 20px;
}

a {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    text-decoration: none;
    color: #00ff00;
    background-color: #000;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #001f1f;
}

/* Logged-in state */
body.logged-in {
    background-color: #001f1f;
}

body.logged-in a {
    background-color: #000;
}

body.logged-in a:hover {
    background-color: #003f3f;
}

</style>
</html>