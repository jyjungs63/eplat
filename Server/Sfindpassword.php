<?php

require_once 'dbinit.php';

$Id     = $_POST["id"];
$Mobile = $_POST["mobile"];

	if ( !empty($Id) && !empty($Mobile) ) {
		
		$res = CheckUser( $Id, $Mobile);
		
		if( $res ) {
			//echo json_encode($res['id']);
            session_start();
			$_SESSION["id"]       = $Id ;			
			$_SESSION["password"] = $res['password'];
			header('location: ../login/login.php?id='.$_SESSION["password"]);  
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

	function CheckUser($Id, $Mobile) {
		global $conn;
		$user = null;
		$Mobile = mysqli_escape_string ( $conn, $Mobile );

		$rs = mysqli_query ( $conn, "select * from eplat_user where id='{$Id}'" );
		
		if ($rs) {
			$user = mysqli_fetch_assoc ( $rs );

			//if ($user &&  password_verify ( $password, $user ['password'] ) != true) {
			if ($user &&  strcmp( $Mobile, $user ['mobile'] ) != 0) {
				$user = null;
			}
			mysqli_free_result ( $rs );
		}
		return $user;
	}
	
$conn->close();
?>