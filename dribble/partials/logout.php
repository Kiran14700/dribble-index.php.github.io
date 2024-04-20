<?php 
session_unset();     
session_destroy();   
 
header("location:Signin.php");   
exit(); 


?>
