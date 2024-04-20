<?php
session_start(); // Start the session

include("partials/db_connect.php");

// Check if $_SESSION['username'] is set and not empty
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    // Redirect to signup page or login page
    header("Location: Signup.php"); 
    exit(); // Stop further execution
}

$username = $_SESSION['username'];

// Handle form submission to update user options
if (isset($_POST['submit'])) {
    // Initialize an array to store the selected options
    $selectedOptions = [];

    // Check if each checkbox is selected and add its value to the array
    if (isset($_POST['designer_share'])) {
        $selectedOptions[] = $_POST['designer_share'];
    }
    if (isset($_POST['hire_designer'])) {
        $selectedOptions[] = $_POST['hire_designer'];
    }
    if (isset($_POST['design_inspiration'])) {
        $selectedOptions[] = $_POST['design_inspiration'];
    }

    // Convert the array to a comma-separated string for database storage
    $optionsStr = implode(",", $selectedOptions);

    // Update the options column in the users table
    $sql = "UPDATE `users` SET `options`='$optionsStr' WHERE `username`='$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Redirect to a success page or display a success message
        header("Location: email.php");
        exit();
    } else {
        echo "Error updating options: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>
    <!-- <link rel="stylesheet" href="css/BringsYou.css"> -->
    <style>
        * {
    padding: 0px;
    margin: 0px;
}

#logo {
    color: #ff00ff;
    margin: 0px 20px 0px 0px;
    height: 2%;
    width: 5%;
    /* border: 2px solid red; */
    position: relative;
    left: 20px;
    font-family: cursive;
}
#whole-content{
    text-align: center;
    /* border: 2px solid red; */
}
#center-boxes{
   display: inline-flex;
   align-content: center;
}
p{ 
    margin: 10px 0px 30px 0px;
}

.box{
    height: 350px;
    width: 367px;
    /* border: 2px solid red; */
    display: inline-block;
    border-radius: 20px;
    margin: 50px 15px 75px 15px;
  
}
#box1{
    /* border: 2px solid black; */
    width: 300px;
    height: 250px;
    margin:2px 2px 2px 2px;
     
}

button{
    display: block;
    width: 15%;
    height: 50px;
    border-radius: 10px;
    background-color: #ff00ff;
    color: white;
    font-size: larger;
    border: none;
    margin: 100px 0px 50px 0px;

   position: relative; 
    left: 42.5%; 
}
@media only screen and (max-width: 600px) {
    #logo {
        height: 15%; /* Increased height for smaller screens */
        width: 15%; /* Increased height for smaller screens */
    }
    #whole-content {
        width: 100%;
        padding: 10px;
    }

    .box {
        width: 90%; /* Adjust box width for smaller screens */
        margin: 20px auto; /* Center boxes horizontally */
    }

    button {
        width: 45%; /* Adjust button width for smaller screens */
       border: 2px solid red;
       position: absolute;
    left: 30%;
    margin: 0px;

    }
}
    </style>
</head>

<body>
    <img src="img/dribble_logo.png" alt="" id="logo">
    <div id="whole-content">
        <h1 class="">What Brings you to Dribble?</h1>
        <p class="">Select the options that best describe you. Don't worry, you can explore other options later.</p>
        <div id="center-boxes">
            <form action="BringsYou.php" method="post">
                <div class="box">
                    <div>
                        <img id="box1" src="img/img1.jpg" alt="">
                    </div>
                    <div>
                        <h3>I'm a designer looking to share my work
                   
                            <input type="checkbox" name="designer_share" value="designer">
                        </h3>
                    </div>
                </div>
                <div id="box2" class="box">
                    <div>
                        <img id="box1" src="img/img2.jpg" alt="">
                    </div>
                    <div>
                        <h3>I'm looking to hire a designer
                            <input type="checkbox"  name="hire_designer" value="hire">
                        </h3>
                    </div>
                </div>
                <div id="box3" class="box">
                    <div>
                        <img id="box1" src="img/img3.jpg" alt="">
                    </div>
                    <div>
                        <h3>I'm looking for design inspiration
                    
                            <input type="checkbox" name="design_inspiration" class="" value="inspiration">
                        </h3>
                    </div>
                </div>

                <button type="submit" name="submit">Finish</button>
            </form>
        </div>
    </div>
</body>



</html>
