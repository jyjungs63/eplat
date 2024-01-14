<?php


require_once '../Server/dbinit.php';

$id       = $_POST['id'];
$step     = $_POST['step'];
$volume   = $_POST['volume'];
// $uid      = $_POST['uid'];
$rows = array();

global $conn;

$sqlstring = "select  volume, step , uid, count(uid) cnt from study_record where id = '{$id}' and step='{$step}' and  volume = '{$volume}' group by uid , step , volume";

$res = mysqli_query ( $conn, $sqlstring);

while ( $row = mysqli_fetch_array($res))
{
    array_push ($rows, 
    array (
        'id'     => $id,
        'step'   => $row['step'],
		'volume' => $row['volume'],
		'uid'    => $row['uid'],
		'cnt'    => $row['cnt']
    ));
}

if ($res) {
	$result = true;
} else {
	$result =  "Error: " . $sql . "<br>" . $conn->error;
}

$res->free();
$conn->close();

header('Content-Type: application/json');

if ( $result == true ) {
	echo json_encode($rows);
} else {
	echo json_encode("Error: " . $sql . "<br>" . $conn->error);
}

?>