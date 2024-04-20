<?php 
    $server="localhost";
    $username="root";
    $password="123456";
    $database="dribble";
    $port=3307;

    $conn=mysqli_connect($server,$username,$password,$database,$port);
    if(!$conn){
        echo "Failed".mysqli_connect_error();
    }else{
        // echo"Connection sucessfully;";
    }
    
?>