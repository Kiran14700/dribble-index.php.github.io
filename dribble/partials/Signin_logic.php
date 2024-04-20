
<?php
session_start();
include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

  
    $sql = "Select * from `users` where username='$username' and  password='$password' ";  
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
   
    if ($result) {
        $_SESSION['username'] = $username;
        header("Location: /DRIBBLE/Mainpage.php");
        
    } else {
        echo "Error: " . mysqli_error($conn);
        header("Location: /DRIBBLE/Signin.php");

    }
}
?>
