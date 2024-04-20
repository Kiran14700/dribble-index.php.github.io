<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/Signup.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css properly not wokring in php dont'konw the reason -->
     <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    /* Include padding and border in element's total width and height */
}

body {
    height: 100vh;
    /* Full viewport height */
    margin: 0;
    /* Remove default body margin */
    display: flex;
    /* Use flexbox for layout */
}

#whole-page {
    display: flex;
    height: 100%;
    width: 100%;
}

img {
    width: 30%;
    height: auto;
    /* border: 2px solid red; */
}

#main {
    flex: 1;
    /* Take remaining space */
    padding: 20px;
}

#Signin {
    text-align: right;
    /* border: 2px solid red; */
    margin: 6px 4px 6px 0px;
    font-size: 16px;
}

#mainContent {
    width: 50%;
    /* Half the width of #main */
    margin: 0 auto;
    /* Center the content horizontally */
    /* border: 2px solid red; */
    padding: 20px;
    /* Adjust padding as needed */
}

#heading {
    font-weight: 700;
    margin: 10px 0px 10px 0px;
    /* border: 2px solid red; */
}

#name{
   
    font-weight: 700;
    /* border: 2px solid red; */
    display: inline-block;

}
#username{
    margin: 0px 0px 0px 25px;
    font-weight: 700;
    /* border: 2px solid red; */
    display: inline-block;
}

.inpBx3 {
    margin: 40px 0px ;
    font-weight: 700;
    /* border: 2px solid red; */

}

.box1 {
    /* Adjusted width for input boxes */
    width: 277px;
    /* Adjusted padding for input boxes */
    padding: 10px;
    background-color: rgb(236, 233, 233);
    border: none;
    display: flex;
    /* border: 2px solid red; */
    
}

.box2 {
    /* Adjusted width for input boxes */
    width: 277px;
    /* Adjusted padding for input boxes */
    padding: 10px;
    background-color: rgb(236, 233, 233);
    border: none;
    /* border: 2px solid red; */

 
    /* Adjusted margin-top for input boxes */
    display: flex;
}

.box3 {
    width: calc(100% - 20px);
    /* Adjusted width for input boxes */
    padding: 10px;
    /* Adjusted padding for input boxes */
    background-color: rgb(236, 233, 233);
    border: none;
   
    /* Adjusted margin-top for input boxes */
}

#submit {
    background-color: rgb(207, 22, 192);
    width: 33%;
    height: 44px;
    padding: 10px;
    border-radius: 11px;
    border: none;
    color: white;
    margin: 20px 0px 20px 0px;
    font-weight: 600;
}

@media only screen and (max-width: 600px) {
    body {
        display: flex;
        flex-direction: column;
    }

    #whole-page {
        flex-direction: column;
    }

    img {
        width: 100%;
        height: auto;
    }

    #main {
        flex: 1;
        padding: 10px;
    }

    #mainContent {
        width: 100%;
        margin: 0 auto; /* Center content horizontally */
        padding: 10px;
    }

    #heading {
        font-size: 24px;
        margin: 10px 0;
    }

    #name, #username, #email, #password {
        width: 100%;
        margin: 10px 0;
    }

    .box1, .box2, .box3 {
        width: 100%;
        padding: 10px;
        background-color: rgb(236, 233, 233);
        border: none;
    }

    #submit {
        width: 100%;
        margin: 20px 0;
    }
}


     </style>
</head>
<body>
<div id="whole-page">
        <img src="img/13824.jpg" alt="Background Image">
        <div id="main">
            <p class="font" id="Signin">Not sign in? <a href="Signup.php"  style="color:rgb(132, 76, 235)">Signup</a></p>
            <div id="mainContent">
                <h2 id="heading">Login to Dribble</h2>
               
                <form action="partials/Signin_logic.php" method="post" id="form">
                 
                    <div id="email" class="inpBx3">
                        <label for="username">Username</label>
                        <input type="text" name="Username" class="box3">
                    </div>
                    <div id="password" class="inpBx3">
                        <label for="password">Password</label>
                        <input type="password" name="Password" class="box3" placeholder="6+ characters">
                    </div>
                  
                    <div class="inputBx">
                        <input type="submit" name="submit" value="Login" id="submit">
                    </div>

                    <p>This site is protected by reCAPTCHA and the Google <a href="http://" style="color:rgb(132, 76, 235)">Privacy Policy</a> and <a href="http://" style="color:rgb(132, 76, 235)">Terms of Service</a> apply</p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
