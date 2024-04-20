<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/email.css">
</head>

<body>
  <?php include("partials/navbar.php"); ?>
  <?php require("partials/db_connect.php");?>


  <div id="content">
    <h1>Please verify your email...</h1>
    <img src="img/email.jpg" alt="">

    <p>Please verify your email address. We've sent a confirmation email to:</p>

    <?php

    if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE `username`='$username'";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $email= $row["email"];
          echo "<p style='font-weight:bolder'>$email</p>";
      }
     
    }
     
  
    ?>

    <p>Click the confirmation link in that email to begin using Dribbble.</p>
    <p>Didn't receive the email? Check your Spam folder, it may have been caught by a filter.</p>
    <p>You still don't see it, <a href="#" style="color: rgb(216, 60, 112);">you can resend the confirmation email</a>.</p>
    <p>Wrong email address? <a href="#" style="color: rgb(216, 60, 112);">Change it</a>.</p>
  </div>

 
</body>
<?php
  include("partials/footer.html");
  ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

</html>
