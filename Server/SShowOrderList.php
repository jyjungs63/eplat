<?php

require_once 'dbinit.php';

session_start();

//$num = $_POST['id'];

global $conn;

$sqlString = "SELECT *  FROM eplat_porlist where confirm = 0"; 

$rows = array();

$i = 0;
    
try {
	
	$rs = mysqli_query($conn,$sqlString);
	
	while($row = mysqli_fetch_array($rs)){
		array_push($rows,
		array(  'id'        => $row['id'],
		'por_id'      => $row['por_id'] ,
		'order'  => $row['order'],								
		'addr'    => $row['addr'],								
		'mobile'      => $row['mobile'],								
		'rdate'   => $row['rdate'],								
		'confirm'   => $row['confirm'],															
	));
	}
	$conn->close();
}
catch (Exception $e)
{
	echo  json_encode( array("error:" => $e->getMessage()) );
}

header('Content-Type: application/json');
echo json_encode($rows);

?>