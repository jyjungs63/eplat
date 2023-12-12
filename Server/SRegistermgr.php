<?php

$result = "";

// $conn = mysqli_connect('localhost','root','','marathonclub');
// mysqli_select_db($conn,'mc_user');

require_once 'dbinit.php';

$json = file_get_contents('php://input');

$arr = json_decode($json, true);

$row = $arr['item'];

$id       = $row['id'];
$name     = $row['name'];
$password = $row['password'];
$mobile   = $row['mobile'];
$addr     = $row['addr'];
$zipcode  = $row['zipcode'];
$idrolebm = $row['idrolebm'];
$mid      = $row['mid'];
$role     = 2;

global $conn;

$sqlstring = "insert into eplat_user (id, name, password, mobile, addr, zipcode, role, mid) 
              values ( '{$id}', '{$name}','{$password}', '{$mobile} ','{$addr}', '{$zipcode}', $role, '{$mid}' )";

$res = mysqli_query ( $conn, $sqlstring);

$conn->close();

header('Content-Type: application/json');
if ($res=== TRUE) {
	$result = true;
	//header('location: ../login/login.php');
} else {
	$result = json_encode(  array( "Error: " => $conn->error ) );

}
echo $result;

?>