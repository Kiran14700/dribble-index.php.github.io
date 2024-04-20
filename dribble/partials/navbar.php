<?php
session_start();
include ("db_connect.php");
if (!empty($username = $_SESSION['username'])) {
    $query = "SELECT * FROM users WHERE `username`='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $profileImg = $row['profile_img'];
    }
}

?>


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

    <style>
    footer {
        background-color: #F0F8FF;
    }

    .cur {
        font-family: "Dancing Script", cursive;
        color: black;
    }

    #search {
        background-color: gainsboro;
        width: 130px;
        padding: 6px;
        background-color: gainsboro;
        border: none;
        color: gainsboro;
    }

    .profile {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .upload {
        background-color: palevioletred;
        color: white;
        border-radius: 8px;
        margin-left: 10px;
    }
    </style>

</head>

<body class="font-sans antialiased text-zinc-900 bg-zinc-50 dark:bg-zinc-800 dark:text-white">
    <nav class="navbar navbar-default bg-white dark:bg-zinc-900 shadow py-4" style="border-bottom: 0.5px solid gr;">
        <div class="max-w-6xl mx-auto px-4 flex justify-between">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand cur" href="#">dribble</a>
            </div>
            <ul class="nav navbar-nav collapse navbar-collapse" id="myNavbar">
                <li><a href="#"
                        class="text-dark font-weight-900 hover:text-zinc-700 dark:hover:text-zinc-300">Inspiration</a>
                </li>
                <li><a href="#" class="text-dark font-weight-bold hover:text-zinc-700 dark:hover:text-zinc-300">Find
                        Work</a>
                </li>
                <li><a href="#" class="text-dark font-weight-bold hover:text-zinc-700 dark:hover:text-zinc-300">Learn
                        Design</a>
                </li>
                <li><a href="#" class="text-dark font-weight-bold hover:text-zinc-700 dark:hover:text-zinc-300">Go
                        Pro</a></li>
                <li><a href="#" class="text-dark font-weight-bold hover:text-zinc-700 dark:hover:text-zinc-300">Hire
                        Designer</a></li>
            </ul>

            <div class="flex items-center space-x-2 navbar-right" style="margin: 8px 10px 8px 10px;">
                <input type="search" placeholder="&#x1F50D; Search"
                    class="bg-gray-200 text-zinc-900 dark:text-white rounded-lg focus:outline-none" id="search">
                <a href="signin.php">
                    <img src="../img/logout.jpg" alt="Logout" class="profile">
                </a>

                <img src="profileImages/<?php echo $row['profile_img'] ?>" alt="profile" class="profile">
                <button class="btn btn-default upload">Upload</button>
            </div>
        </div>
    </nav>

    <!-- Bootstrap and JavaScript scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>