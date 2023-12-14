<?php


$mysqli = mysqli_connect('localhost','root','manager','eplat');  // local test
mysqli_select_db($mysqli,'eplat');

$pid       = $_POST['id'];
$rows = array();
$i = 0;
$res = "";

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = "select * from eplat_porlist where por_id='{$pid}' ";

$rs = mysqli_query($mysqli, $stmt);

while ( $row = mysqli_fetch_array($rs))
{
    array_push ($rows, 
    array (
        'id'   => $pid,
        'json' => $row['por_list'],
        'order' => $row['order'],
        'rdate' => $row['rdate'],
        'addr'  => $row['addr']
    ));
}

$mysqli->close();
header('Content-Type: application/json');

echo json_encode($rows);


?>