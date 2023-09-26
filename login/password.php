<?php 

session_start();
if( isset($_SESSION['password']))
{
    echo "<h5 align='center'>Welcome eplat study home</h5>";
    echo "<h5 align='center'>Your Password = ".$_SESSION["password"]."</h5>";  
    echo "<p align='center'><a href='login.php'>Login</a></p>";  
}
else
{
    //header('location:login.php');  
}


?>