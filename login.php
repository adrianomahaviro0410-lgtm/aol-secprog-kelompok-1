<?php
// Form Login
// TODO: Buat form login yang mengirim email dan password ke actions/do_login.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - ShopSecure</title>
</head>
<body>
    <h2>Login</h2>
    <form action="/actions/do_login.php" method="POST">
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="/register.php">Belum punya akun? Register</a> | 
    <a href="/forgot-password.php">Lupa password?</a>
</body>
</html>
