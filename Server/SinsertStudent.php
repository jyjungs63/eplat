<?php

require_once 'dbinit.php';

global $location;

session_start();

$json = file_get_contents('php://input');

$arr = json_decode($json, true);
$id="";
$result="";

global $conn;

try {

	foreach ( $arr['item'] as $row) {
		
		$id = $row['id'];
		$name = $row['name'];
		$password = $row['passwd'];
		$pid = $row['tid'];
		$classnm = $row['classnm'];

		$sql = "insert into eplat_user (id, name, password, role, pid, classnm, rdate) 
		        values ('{$id}', '{$name}','{$password}', 0 , '{$pid}', '{$classnm}', now())";

		if ($conn->query($sql) === TRUE) {
			$result =  "New record created successfully";
		} else {
			$result =  "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	$conn->close();
}
catch (Exception $e) {
	echo json_encode($e->getMessage());
}

echo json_encode($result);

?>