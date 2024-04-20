<?php
session_start(); // Start the session
include("partials/db_connect.php"); // Adjust the path to db_connect.php

// Check if session username is set
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo "Session username not set or empty!";
    exit(); // Stop further execution
}
$username = $_SESSION['username'];
if (isset($_POST['submit'])) {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "profileImages/" . $file_name; // Adjust the path to the img/ directory

    // Move uploaded file to destination folder
    if (move_uploaded_file($tempname, $folder)) {
        // Update the profile_img column in the users table
        $sql = "UPDATE `users` SET `profile_img`='$file_name' WHERE `username`='$username'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: /DRIBBLE/Profile.php"); // Redirect back to the profile page
            exit(); // Stop further execution
        } else {
            echo "Error updating database: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file: ".$_FILES['image']['error']; // Display specific upload error
    }
}

// if user add location then it catch it
if(isset($_POST['submit2'])){
    $location=$_POST['location'];
    $sql="UPDATE `users` SET `location`='$location' WHERE `username`='$username'";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        header("Location:/DRIBBLE/BringsYou.php");
        exit(); // Stop further execution
    } else {
        echo "Error updating database: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="css/Profile.css"> -->
    <title>Hello, world!</title>
    <style>
        /* Your CSS styles */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
        }
        
        img {
            max-width: 100%;
            height: auto;
        }
        
        #logo {
            color: #ff00ff;
            margin: 0px 20px 0px 0px;
            height: 2%;
            width: 5%;
            position: relative;
            left: 20px;
            font-family: cursive;
        }
        
        #content {
            width: 70%;
            max-width: 800px;
            margin: 20px auto;
        }

        .small {
            margin: 15px 0px 30px 0px;
        }
        
        .avatar {
            font-weight: 900;
            margin: 40px 0px 15px 0px;
            font-size: 18px;
        }
        
        #profile {
            border: 2px dotted grey;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 21px auto 10px;
            display: inline-block;
        }

        #Uploading-img {
            display: inline-block;
        
           vertical-align: top; /*  Align to the top of the profile image */
            margin-left: 10px; /* Adjust margin for spacing */
            border-color: 2px solid red;
        }

        .location {
            /* border: 2px solid grey; */
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border-style: 0px 0px 2px 0px ;
        }
        
        .button {
            background-color: #dd13ddda;
            padding: 10px 50px;
            color: white;
            margin: 20px 0;
            border-radius: 10px;
            border: none;
        }
        
        .button:hover {
            background-color: rgba(255, 0, 255, 1);
        }
        @media only screen and (max-width: 600px) {
            /* Adjustments for smaller screens */
            #content {
                width: 100%;
                padding: 10px;
            }

            .avatar {
                font-size: 16px;
            }

            .button {
                padding: 10px 30px;
            }

            #logo {
                height: 15%; /* Increased height for smaller screens */
                width: 15%; /* Increased height for smaller screens */
            }
        }
    </style>
</head>

<body>
    <img src="img/dribble_logo.png" alt="" id="logo">
    <div id="content">
        <h1 class="heading">Welcome! Let's create your profile</h1>
        <p class="small">Let others get to know you better! You can do these later</p>

        <h5 class="avatar"> Add an avatar</h5>

        <?php
        // Check if $_SESSION['username'] is set and not empty again before accessing the user data
        if (!empty($_SESSION['username'])) {
            $query = "SELECT * FROM users WHERE `username`='$username'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['profile_img']=$row['profile_img'];
            }
        }
        ?>
                <img src="profileImages/<?php echo $row['profile_img'] ?>" alt="" id="profile">


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="Uploading-img" >
            <input type="file" name="image" accept=".jpg,.jpeg,.png" placeholder="choose" /><br>
          <button type="submit" class="button" name="submit">Submit</button>
        </form>

        <h5 class="avatar">Add your location</h5>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
            <input type="text" placeholder="Enter a location" class="location" name="location" /><br>
            <button type="submit" class="button" name="submit2">Next</button>
        </form>

    </div>
</body>

</html>
