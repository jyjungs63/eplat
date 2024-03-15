<?php

$fullURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$location = "localhost";

try {
    // if ( strpos ( $fullURL, "localhost") !== false || strpos ( $fullURL, "10.15") !== false) {
    //     $conn = mysqli_connect('localhost','root','manager','happyzip');             // local test
    // }
    // else {
    //     $conn = mysqli_connect('localhost','happyzip','skl32935028@','happyzip');  // local test
    //     $location = "eplat";
    // }
    $conn = mysqli_connect('localhost','root','manager','happyzip');
    mysqli_select_db($conn,'happyzip');
}
catch (Exception $e) {
    echo json_encode ( array("result:" => $e->getMessage() ));
}

// $conn = mysqli_connect('localhost','happyzip','skl32935028@','happyzip');  // local test
// mysqli_select_db($conn,'happyzip');


// $conn = mysqli_connect('localhost','jyjungs63','dbmanager1963','jyjungs63');
// mysqli_select_db($conn,'jyjungs63');

// $conn = mysqli_connect('localhost','root','','marathonclub');
// mysqli_select_db($conn,'mc_user');

?>