<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HR Manager Login</title>
</head>
<body>
    <header><h1>HR Manager Login</h1></header>
    <form method="post" action="process.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="hidden" name="token" value="abc123">
        <input type="submit" value="Login">
    </form>
    <footer><p>&copy; 2026 HR Manager Login Form. All rights reserved.</p></footer>
</body>
</html>