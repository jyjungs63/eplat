<?php

require_once 'dbinit.php';

session_start();

$pid = $_POST['id'];

global $conn;

$sqlString = "select unique(classnm) classnm from eplat_user where pid = '{$pid}'"; 

$rows = array();

$i = 0;
    
try {
	
	$rs = mysqli_query($conn,$sqlString);
	
	while($row = mysqli_fetch_array($rs)){
		array_push($rows,
		    array(  'classnm'      => $row['classnm'],													
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