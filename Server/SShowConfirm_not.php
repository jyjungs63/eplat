<?php

require_once 'dbinit.php';

session_start();

$num = $_POST['num'];

global $conn;

$sqlString = "SELECT *  FROM eplat_user where role = 1"; 

if ( $num == "2")
    $sqlString = "SELECT *  FROM eplat_user where role = 1 and confirm = 0"; 
else if ( $num == "1")
    $sqlString = "SELECT *  FROM eplat_user where role = 1 and confirm = 1"; 

    
$rs = mysqli_query($conn,$sqlString);
$rows = array();

$i = 0;

try {

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
$conn->close();
}
catch (Exception $e) {
	json_encode( $e->getMessage() );
}

//$result["rows"] = $rows;

header('Content-Type: application/json');
echo json_encode($rows);

?>