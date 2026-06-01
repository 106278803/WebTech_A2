<?php
session_start();
require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$admin = "admin";
$check = $conn->prepare("SELECT * FROM users WHERE username = ?");
$check->bind_param("s", $admin);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows === 0) {
    $hashed_password = password_hash("admin", PASSWORD_DEFAULT);
    $insert = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $insert->bind_param("ss", $admin, $hashed_password);
    $insert->execute();
    $insert->close();
}
$check->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
        exit();
    } else {
        echo "Incorrect username or password.";
    }

    $stmt->close();
}

$conn->close();
?>