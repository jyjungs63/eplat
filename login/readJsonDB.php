<?php


$mysqli = mysqli_connect('localhost','root','manager','eplat');  // local test
mysqli_select_db($mysqli,'eplat');

$id       = $_POST['id'];
$rows = array();
$i = 0;
$res = "";

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = "select * from json_data where id={$id} ";
//$stmt = "select * from json_data where id={$id} ";

$rs = mysqli_query($mysqli, $stmt);

while ( $row = mysqli_fetch_array($rs))
{
    array_push ($rows, 
    array (
        'id'   => $id,
        'json' => $row['json_column']
    ));
}

$mysqli->close();
header('Content-Type: application/json');

// Output the JSON data

echo json_encode($rows);
//echo(json_encode(["json"=> $rows]));

//
//CREATE TABLE json_data (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    json_column JSON
//);
//

?>

