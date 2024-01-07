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
$zipcode  = $_POST['zipcode'];

    
$role = 0;
if ( isset($_POST['idrolebm']) )   // 지사장
	$role = 1;
if ( isset($_POST['idrolet']) )     // 원장, 선생님
	$role = 2;
if ( isset($_POST['idroleother']) )     // 일반 유료 회원
	$role = 3;
	

// $id       = 'jyjungs@gmail.com';
// $name     = '정진영';
// $password = 'william63';
// $role     = '0';

global $conn;

try {

	$id= mysqli_escape_string ( $conn, $id);
	//$passwordnew = mysqli_escape_string ( $conn, password_hash ( $password, PASSWORD_BCRYPT ) );
	
	$sqlstring = "insert into eplat_user (id, name, password, mobile, addr, zipcode, role) 
	values ( '{$id}', '{$name}','{$password}', '{$mobile} ','{$addr}', '{$zipcode}', $role )";
	
	$res = mysqli_query ( $conn, $sqlstring);
	
	$conn->close();
}
catch (Exception $e) {
	echo json_encode( $e->getMessage() );
}

header('Content-Type: application/json');
if ($res=== TRUE) {
	$result = true;
	header('location: ../login/login.php');
} else {
	$result = json_encode(  array( "Error: " => $conn->error ) );
	echo $result;
}

?>