<?php

require_once 'dbinit.php';

session_start();

$json = file_get_contents('php://input');

$arr = json_decode($json, true);
$id="";

global $conn;

foreach ( $arr['item'] as $row) {
	$sql = "UPDATE eplat_user SET id = '".$row['id']."'
	,name = '".$row['name']."' 
	,password = '".$row['password']."' 
	,mobile = '".$row['mobile']."' 
	,addr = '".$row['addr']."' 
	,zipcode = '".$row['zipcode']."' 
	,confirm = ".$row['confirm']." 
	WHERE id = '".$row['id']."'";
	$result = $mysqli->query($sql);	
}


$sql = "SELECT * FROM items "; 


$result = $mysqli->query($sql);


$data = $result->fetch_assoc();


echo json_encode($data);

?>