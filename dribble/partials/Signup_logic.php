<?php
session_start();
include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Name'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Check if username already exists
    $existUsernameSql = "SELECT * FROM `users` WHERE username='$username'";
    $resultUsername = mysqli_query($conn, $existUsernameSql);
    $numExistsUsername = mysqli_num_rows($resultUsername);

    if ($numExistsUsername > 0) {
        $_SESSION['existUsername'] = true;
        header("Location: /DRIBBLE/index.php");
        exit();
    }

    // Check if email already exists
    $existEmailSql = "SELECT * FROM `users` WHERE email='$email'";
    $resultEmail = mysqli_query($conn, $existEmailSql);
    $numExistsEmail = mysqli_num_rows($resultEmail);

    if ($numExistsEmail > 0) {
        $_SESSION['existEmail'] = true;
        header("Location: /DRIBBLE/index.php");
        exit();
    }

    // If both username and email are available, proceed with registration
    $sql = "INSERT INTO `users` (`name`, `username`, `password`, `email`, `dt`) VALUES ('$name', '$username', '$password', '$email', current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['username'] = $username;
        header("Location: /DRIBBLE/Profile.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
