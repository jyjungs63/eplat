<?php

require_once 'dbinit.php';

session_start();

$pid = $_POST['id'];
$classnm = $_POST['classnm'];

global $conn;

$sqlString = "SELECT *  FROM eplat_user where pid = '{$pid}' and classnm = '{$classnm}'"; 

$rows = array();

$i = 0;
    
try {
	
	$rs = mysqli_query($conn,$sqlString);
	
	while($row = mysqli_fetch_array($rs)){
		array_push($rows,
		array(  'Id'      => $row['id'],
                'Name'  => $row['name'] ,
                'Passwd'   => $row['password'],								
                // 'addr'    => $row['addr'],								
                // 'mobile'  => $row['mobile'],								
                'rdate'   => $row['rdate'],								
                // 'confirm' => $row['confirm'],															
	    ));
	}
	$conn->close();
}
catch (Exception $e)
{
	echo  json_encode( array("error:" => $e->getMessage()) );
}

header('Content-Type: application/json');
echo json_encode( array ("json" => $rows) );

?>