<?php


$conn = mysqli_connect('localhost','root','manager','eplat');  // local test
mysqli_select_db($conn,'eplat');

$id       = $_POST['id'];
$json     = $_POST['json_file'];

global $conn;

$sqlstring = "insert into study_json (id, jsonfile) values ('{$id}', '{$json}'";

$res = mysqli_query ( $conn, $sqlstring);

if ($res=== TRUE) {
	$result = true;
} else {
	$result =  "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>