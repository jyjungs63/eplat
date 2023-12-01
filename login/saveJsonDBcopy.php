<?php


$mysqli = mysqli_connect('localhost','root','manager','eplat');  // local test
mysqli_select_db($mysqli,'eplat');

$id       = $_POST['id'];
$json     = $_POST['json_file'];
$res = "";

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

//$jsonData = '{"name": "John", "age": 30, "city": "New York"}'; // Your JSON data

$stmt = $mysqli->prepare("INSERT INTO json_data (json_column) VALUES (?)");
$stmt->bind_param("s", $json);

if ($stmt->execute()) {
    $res = "JSON data inserted successfully!";
} else {
    $res = "Error: " . $stmt->error;
}

$mysqli->close();

echo(json_encode(["id"=>$id]));
?>