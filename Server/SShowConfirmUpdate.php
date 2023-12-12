<?php

require_once 'dbinit.php';

session_start();

$json = file_get_contents('php://input');

$arr = json_decode($json, true);
$id="";

global $conn;
$result = "";

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
    } else {
        $result =  "Error updating record: " . $conn->error;
    }
}

$conn->close();

echo json_encode($result);

?>