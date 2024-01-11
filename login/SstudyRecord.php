<?php

// $conn = mysqli_connect('localhost','root','manager','eplat');  // local test
// mysqli_select_db($conn,'eplat');
require_once '../Server/dbinit.php';

session_start();

$id       = $_POST['id'];
$step     = $_POST['step'];
$volume   = $_POST['volume'];
$uid      = $_POST['uid'];

global $conn;

$sqlstring = "insert into study_record (id, step, volume, uid) values ('{$id}', '{$step}', '{$volume}', '{$uid}')";

$res = mysqli_query ( $conn, $sqlstring);

if ($res=== TRUE) {
	$result = true;
} else {
	$result =  "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>