<?php

	require_once 'dbinit.php';

	session_start();

	$id = $_POST['id'];
	$porlist = $_POST['postlist'];
	$porid = $_POST['porid'];

	global $conn;
	global $location;
	
	$rows = array();
	$pdfname="";
	$user="admin";
	$res = "";
	$res1= "";
	$url="http://localhost:3000/Server/uploads/";

	if ( $location == "eplat")
		$url = "https://eplat.co.kr/Server/uploads/";

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
	}
	
	try {

		$sqlstring = "insert into eplat_porlist ( id, por_id, por_list, rdate ) values ( '{$id}', '{$porid}',  '{$porlist}',  NOW())";
		$res1 = mysqli_query ( $conn,  $sqlstring);
		
		if ($res=== TRUE && $res1 == TRUE) {
			$result = ['url' => $url.$pdfname];
		} else {
			$result =  ['url' => 'http://localhost:3000/Server/uploads/cC6Gw7chIxgSkKlgenerated_pdf.pdf'];
		}
		
		$conn->close();
	}
	catch (Exception $e)
	{
		echo json_encode( array ("Error:" => $e->getMessage() ));
	}
	
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