<?php

// require_once 'dbinit.php';

session_start();

//global $conn;
$rows = array();
$pdfname="";
$user="admin";

	foreach($_FILES as $index => $file)
	{
		// for easy access
		$fileName     = $file['name'];
		// for easy access
		$fileTempName = $file['tmp_name'];
		// check if there is an error for particular entry in array
		if(!empty($file['error'][$index]))
		{
			return false;
		}
		// check whether file has temporary path and whether it indeed is an uploaded file
		if(!empty($fileTempName) && is_uploaded_file($fileTempName))
		{
			// move the file from the temporary directory to somewhere of your choosing
			$RandomName = generateRandomString(15);
			$pdfname = $RandomName . $fileName;
			$res = move_uploaded_file($fileTempName, "uploads/" . $RandomName . $fileName);
			//move_uploaded_file($fileTempName, "uploads/" . $fileName);
			$tmp = $fileTempName;
		}
		// array_push($rows, array(
		// 	'name'     => $fileName,
		// 	'fakename' => $RandomName. $fileName,
		// 	'size'     => $file['size'],
		// ));		
	}
	// $jsarr = json_encode ($rows);
	// $sqlstring = "insert into repository ( title, id, contents, rdate ) values ( '$content', '$user',  '$jsarr',  NOW())";
	// $res = mysqli_query ( $conn,  $sqlstring);
	
	if ($res=== TRUE) {
		$result = ['url' => 'http://localhost:3000/Server/uploads/'.$pdfname];
	} else {
		$result =  ['url' => 'http://localhost:3000/Server/uploads/cC6Gw7chIxgSkKlgenerated_pdf.pdf'];
	}

	// header('Content-Type: application/json');
	// echo json_encode($result);
	// $data = [
	// 	'id' => 1,
	// 	'name' => 'John Doe',
	// 	'email' => 'johndoe@example.com'
	// ];
	
	// Set the response content type to JSON
	header('Content-Type: application/json');
	
	// Output the data as JSON
	echo json_encode($result);


function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>