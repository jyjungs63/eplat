<?php

require_once 'dbinit.php';
$Email    = $_POST["Email"];
$Password = $_POST["Password"];

// $Email    = 'jyjungs@gmail.com';
// $Password = 'william63';
global $location;

	if ( !empty($Email) && !empty($Password) ) {
		
		$res = CheckUser( $Email, $Password);
		
		if( $res ) {
			session_start();
			$_SESSION["authenticated"] = 'true';
			$_SESSION["user"] = $res['id'];
			$_SESSION["name"] = $res['name'];
			$_SESSION["role"] = $res['role'];
			$_SESSION["confirm"] = $res['confirm'];
			$_SESSION["location"] = $location;
			//echo json_encode($res['id']);
			if (isset($_GET['dest'])) {
				$urlFromGET = $_GET['dest'];
				header('location: welcome.php?dest='.$urlFromGET );  
			}
			else
				header('location: ../index_admin.php?id='.$_SESSION["user"]);  
			echo json_encode("success");
		}
		else {
			//hearder("Location: login.php");
			echo json_encode("falure");
		}
	}
	else {
		//header("Location: login.php");
		echo json_encode("falure");
	}

	function CheckUser($login, $password) {
		global $conn;
		$user = null;
		$login = mysqli_escape_string ( $conn, $login );
		$rs = mysqli_query ( $conn, "select * from eplat_user where id='{$login}'" );
		
		if ($rs) {
			$user = mysqli_fetch_assoc ( $rs );
			$passwordnew = mysqli_escape_string ( $conn, password_hash ( $password, PASSWORD_BCRYPT ) );
			//if ($user &&  password_verify ( $password, $user ['password'] ) != true) {
			if ($user &&  strcmp( $password, $user ['password'] ) != 0) {
				$user = null;
			}
			mysqli_free_result ( $rs );
		}
		return $user;
	}
	
$conn->close();
?>