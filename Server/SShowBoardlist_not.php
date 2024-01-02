<?php

require_once 'dbinit.php';

session_start();

$num = $_POST['num'];

global $conn;

try {
	if ( $num == -1) {
		$sqlString = "SELECT num, title, id, contents, rdate  FROM repository order by num desc"; 
	}
	else
		$sqlString = "SELECT num, title, id, contents, rdate  FROM repository where num =". $num ." order by num desc"; 

	$rs = mysqli_query($conn,$sqlString);
	$rows = array();

	$i = 0;

	while($row = mysqli_fetch_array($rs)){
		array_push($rows,
				array(  'num'      => $row['num'],
						'title'    => $row['title'] ,
						'id'       => $row['id'],								
						'contents' => $row['contents'],								
						'rdate'    => $row['rdate'],								
				));
	}
}
catch (Exception $e)
{
	return json_encode( $e->getMessage() );
}

$result["rows"] = $rows;
header('Content-Type: application/json');
echo json_encode($rows);

?>