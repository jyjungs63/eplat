<?php


// $mysqli = mysqli_connect('localhost','root','manager','eplat');  // local test
// mysqli_select_db($mysqli,'eplat');
require_once 'dbinit.php';

session_start();

global $conn;

$pid       = $_POST['id'];
$rows = array();
$i = 0;
$res = "";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = "select * from eplat_porlist where por_id='{$pid}' ";

$rs = mysqli_query($conn, $stmt);

while ( $row = mysqli_fetch_array($rs))
{
    array_push ($rows, 
    array (
        'id'   => $row['id'],
        'json' => $row['por_list'],
        'order' => $row['order'],
        'rdate' => $row['rdate'],
        'addr'  => $row['addr'],
        'mobile'  => $row['mobile'],
        'confirm'  => $row['confirm']
    ));
}

$conn->close();
header('Content-Type: application/json');

echo json_encode($rows);


?>