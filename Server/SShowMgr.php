<?php

require_once 'dbinit.php';

session_start();

$role = $_POST['role'];
$id = $_POST['id'];

global $conn;

$sqlString = "SELECT * FROM eplat_user where role = 2 and mid = '".$id."'"; 
    
$rs = mysqli_query($conn,$sqlString);
$rows = array();

$i = 0;

while($row = mysqli_fetch_array($rs)){
	array_push($rows,
			array(  'id'        => $row['id'],
					'name'      => $row['name'] ,
					'password'  => $row['password'],								
					'mobile'    => $row['mobile'],								
					'addr'      => $row['addr'],								
					'zipcode'   => $row['zipcode'],								
					'confirm'   => $row['confirm'],								
					'rdate'     => $row['rdate'],								
			));
}

$result["rows"] = $rows;

echo json_encode($rows);

?>