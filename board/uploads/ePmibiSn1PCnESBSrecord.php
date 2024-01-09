<?php

require_once '../server/dbinit.php';

session_start();
$content   = $_POST['idContent'];
$user =  'admin';

//global $conn;
$rows = array();

if (  !empty($user) ) 
{
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
			move_uploaded_file($fileTempName, "uploads/" . $RandomName . $fileName);
			//move_uploaded_file($fileTempName, "uploads/" . $fileName);
			$tmp = $fileTempName;
		}
		array_push($rows, array(
			'name'     => $fileName,
			'fakename' => $RandomName. $fileName,
			'size'     => $file['size'],
		));		
	}
	$jsarr = json_encode ($rows);
	$sqlstring = "insert into repository ( title, id, contents, rdate ) values ( '$content', '$user',  '$jsarr',  NOW())";
	$res = mysqli_query ( $conn,  $sqlstring);
	
	if ($res=== TRUE) {
		$result = true;
	} else {
		$result =  "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	echo json_encode($result);
}
else 
{
	Header("Location: login.php");
}

function resize_image($file, $w, $h, $crop=FALSE) {
	
	$percent = 0.5;
	
	list($width, $height) = getimagesize($file);
	$newwidth = $width * $percent;
	$newheight = $height * $percent;
	
	$src = imagecreatefromjpeg($file);
	$dst = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresized($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	
	imagejpeg($dst);
	
	return $dst;
}

function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
?>