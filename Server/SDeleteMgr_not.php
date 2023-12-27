<?php

require_once 'dbinit.php';

session_start();

$id  = $_POST["id"];

global $conn;
$res="";

try {

	$sql = "DELETE FROM eplat_user WHERE id = '".$id."'";
	
	if ($conn->query($sql) === TRUE) {
		$res = true;
	} else {
		$res =  json_encode(  array("Error deleting record: " . $conn->error) );
	}
	
	$conn->close();
}
catch (Exception $e) {
	echo json_encode( $e->getMessage());
}


echo json_encode($res);

?>