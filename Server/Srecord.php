<?php

require_once 'dbinit.php';

session_start();
$rdate   = $_POST['rdate'];
$record  = $_POST['record'];
$km      = $_POST['km'];
// $rdate   = date("Y-m-d");
// $record  = "00:22:00";
// $km      = 0;


$ref_email =  'jyjungs@gmail.com';
//$ref_email =  $_SESSION["user"];
$ikm = 0;

 if ($km == "5 Km") 
 	$ikm = 0;
 else if ($km == "10 Km")
 	$ikm = 1;
 else if ($km == "half")
 	$ikm = 2;
 else if ($km == "full")
 	$ikm = 3;
 else if ($km == "100 Km")
 	$ikm = 4;
 	
//$_FILES['file']['name'] = 'C:\\hangil.PNG';
global $conn;

if (  !empty($ref_email) ) 
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
			move_uploaded_file($fileTempName, "uploads/" . $fileName);
			$tmp = $fileTempName;
			//resize_image($fileName,100,100);
			// mark-up to be passed to jQuery's success function.
			
			//echo $sqlstring;			
		}
		
		$sqlstring = "insert into mc_record ( ref_email, rdate, image, record, km ) values ( '$ref_email', NOW(), '$fileName', '$record', $ikm)";
		$res = mysqli_query ( $conn, $sqlstring);
		
		if ($res=== TRUE) {
			$result = true;
		} else {
			$result =  "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	$conn->close();
	echo '<p>Click <strong><a href="Server/uploads/' . $fileName . '" target="_blank">' . $fileName  . ' </a></strong> to download it. record ' .$record . '</p>' ;
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
?>