<?php

require_once 'dbinit.php';

session_start();

$json = file_get_contents('php://input');

$arr = json_decode($json, true);


global $conn;

foreach ( $arr as $row) {
	$sql = "UPDATE eplat_user SET id = '".$row['id']."'
	,name = '".$row['name']."' 
	,password = '".$row['password']."' 
	,mobile = '".$row['mobile']."' 
	,addr = '".$row['addr']."' 
	,zipcode = '".$row['zipcode']."' 
	,confirm = ".$row['confirm']." 
	WHERE id = '".$id."'";
	$result = $mysqli->query($sql);
}


$sql = "SELECT * FROM items WHERE id = '".$id."'"; 


$result = $mysqli->query($sql);


$data = $result->fetch_assoc();


echo json_encode($data);

?>