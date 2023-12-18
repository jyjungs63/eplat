<?php

require_once 'dbinit.php';

session_start();

$json = file_get_contents('php://input');

$arr = json_decode($json, true);
$id="";
global $conn;
$result = "";

try {
	foreach ( $arr['item'] as $row) {
		$sql = "UPDATE eplat_user SET id = '".$row['id']."'
		,name = '".$row['name']."' 
		,password = '".$row['password']."' 
		,mobile = '".$row['mobile']."' 
		,addr = '".$row['addr']."' 
		,zipcode = '".$row['zipcode']."' 
		,confirm = ".$row['confirm']." 
		WHERE id = '".$row['id']."'";
		if ($conn->query($sql) === TRUE) {
			$result = true;
		} 
	}

	$conn->close();
}
catch (Exception $e) {
	$result = $e.getMessage();
}

header('Content-Type: application/json');

echo json_encode(  array( "result: " => $result ) );

?>