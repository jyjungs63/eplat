<?php

$fullURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo "Full URL: " . $fullURL;

if ( strpos ( $fullURL, "localhost") !== false)
{
    $conn = mysqli_connect('localhost','root','leadship!','happyzip');             // local test  
    mysqli_select_db($conn,'happyzip');

}
else{
    $conn = mysqli_connect('localhost','happyzip','skl32935028@','happyzip');  // local test
    mysqli_select_db($conn,'happyzip');
}


// $conn = mysqli_connect('localhost','happyzip','skl32935028@','happyzip');  // local test
// mysqli_select_db($conn,'happyzip');


// $conn = mysqli_connect('localhost','jyjungs63','dbmanager1963','jyjungs63');
// mysqli_select_db($conn,'jyjungs63');

// $conn = mysqli_connect('localhost','root','','marathonclub');
// mysqli_select_db($conn,'mc_user');

?>