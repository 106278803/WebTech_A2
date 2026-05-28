<?php
session_start();
require_once("settings.php");

$conn = mysql_connect($host, $user, $pwd, $sql_db);

$username=$_POST('username');
$password=$_POST('password');


$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if($username=='admin' && $password == 'admin') {
    $_SESSION['username'] = $username;
    header('Location: manage.php');
} else {
    echo "Invalid login";
}
?>