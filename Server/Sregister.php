<?php

$result = "";

// $conn = mysqli_connect('localhost','root','','marathonclub');
// mysqli_select_db($conn,'mc_user');

require_once 'dbinit.php';

$id       = $_POST['id'];
$name     = $_POST['name'];
$password = $_POST['password'];
$mobile   = $_POST['mobile'];
$addr     = $_POST['addr'];

// $id       = 'jyjungs@gmail.com';
// $name     = '정진영';
// $password = 'william63';
// $role     = '0';

global $conn;
$id= mysqli_escape_string ( $conn, $id);
//$passwordnew = mysqli_escape_string ( $conn, password_hash ( $password, PASSWORD_BCRYPT ) );


$sqlstring = "insert into eplat_user (id, name,mobile, password, address) values ( '{$id}', '{$name}','{$mobile} ', '{$password}', '{$addr}' )";
$res = mysqli_query ( $conn, $sqlstring);

if ($res=== TRUE) {
	$result = true;
	header('location: ../login/login.php');
} else {
	$result =  "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>