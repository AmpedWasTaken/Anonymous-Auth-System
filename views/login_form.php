<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="?action=login">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <br>
        <input type="submit" value="Login">
    </form>
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
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    margin: 10px 0;
}

input[type="text"],
input[type="password"] {
    width: 250px;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #00ff00;
    background-color: #000;
    color: #00ff00;
}

input[type="submit"] {
    width: 150px;
    padding: 10px;
    margin-top: 15px;
    border: none;
    background-color: #001f1f;
    color: #00ff00;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #003f3f;
}


</style>
</html>
