<?php

require_once 'dbinit.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['functionName'] )) {
        $functionName = $_POST['functionName'];

        if (is_callable($functionName)) {
            if ( "SUploadBoardPDF" == $functionName || "SUploadBoard" == $functionName)
                $functionName($_POST);
            else
                $functionName($_POST['otherData']);
        }          
    }
}

function Slogon($data)
{
$Email    = $data["Email"];
$Password = $data["Password"];
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
			header('location: ../index_admin.php?id='.$_SESSION["user"]);  
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
    $conn->close();
}

function SRegister ($data) {

    $id       = $data['id'];
    $name     = $data['name'];
    $password = $data['password'];
    $mobile   = $data['mobile'];
    $addr     = $data['addr'];
    $zipcode  = $data['zipcode'];
    $idrolebm = $data['idrolebm'];
    $role = 0;
    if ( $idrolebm != null && $idrolebm == "on") 
        $role = 1;
           
    global $conn;
    
    try {
    
        $id= mysqli_escape_string ( $conn, $id);
        //$passwordnew = mysqli_escape_string ( $conn, password_hash ( $password, PASSWORD_BCRYPT ) );
        
        $sqlstring = "insert into eplat_user (id, name, password, mobile, addr, zipcode, role) 
        values ( '{$id}', '{$name}','{$password}', '{$mobile} ','{$addr}', '{$zipcode}', $role )";
        
        $res = mysqli_query ( $conn, $sqlstring);
        
        $conn->close();
    }
    catch (Exception $e) {
        echo json_encode( $e->getMessage() );
    }
    
    header('Content-Type: application/json');
    if ($res=== TRUE) {
        $result = true;
        header('location: ../login/login.php');
    } else {
        $result = json_encode(  array( "Error: " => $conn->error ) );
        echo $result;
    }
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

function SShowOrderList( $data ) {

    session_start();

    //$num = $_POST['id'];

    global $conn;

    $sqlString = "SELECT *  FROM eplat_porlist where confirm = 0"; 

    $rows = array();

    $i = 0;
        
    try {
        
        $rs = mysqli_query($conn,$sqlString);
        
        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
            array(  'id'        => $row['id'],
            'por_id'      => $row['por_id'] ,
            'order'  => $row['order'],								
            'addr'    => $row['addr'],								
            'mobile'      => $row['mobile'],								
            'rdate'   => $row['rdate'],								
            'confirm'   => $row['confirm'],															
        ));
        }
        $conn->close();
    }
    catch (Exception $e)
    {
        echo  json_encode( array("error:" => $e->getMessage()) );
    }

    header('Content-Type: application/json');
    echo json_encode($rows);
}

function SPorDetailList ($data) {
    session_start();

    global $conn;
    
    $pid  = $data['id'];
    $rows = array();
    $i = 0;
    $res = "";
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = "select * from eplat_porlist where por_id='{$pid}' ";
    
    try {
    
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
    }
    catch (Exception $e) {
        echo json_encode ( $e->getMessage());
    }
    
    header('Content-Type: application/json');
    echo json_encode($rows);
      
}

function SShowMgr ($data) {
    session_start();

    global $conn;

    $role = $data['role'];
    $id   = $data['id'];

    try {


        $sqlString = "SELECT * FROM eplat_user where role = 2 and mid = '".$id."'"; 
            
        $rs = mysqli_query($conn,$sqlString);
        $rows = array();

        $i = 0;

        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
                    array(  'id'        => $row['id'],
                            'name'      => $row['name'] ,
                            'password'  => $row['password'],								
                            'mobile'    => $row['mobile'],								
                            'addr'      => $row['addr'],								
                            'zipcode'   => $row['zipcode'],								
                            'confirm'   => $row['confirm'],								
                            'rdate'     => $row['rdate'],								
                    ));
        }
        $conn->close();
        $result["rows"] = $rows;

        header('Content-Type: application/json');
        echo json_encode($rows);
    }
    catch (Exception $e)
    {
        header('Content-Type: application/json');
        echo json_encode( array( "Error: " => $e->getMessage() ) );
    }
}

function SDeleteMgr ($data) {
    session_start();

    $id  = $data["id"];

    global $conn;
    $res="";

    try {

        $sql = "DELETE FROM eplat_user WHERE id = '".$id."'";
        
        if ($conn->query($sql) === TRUE) {
            $res = true;
        } else {
            $res =  json_encode(  array("Error deleting record: " . $conn->error) );
        }
        
        $conn->close();
    }
    catch (Exception $e) {
        echo json_encode( $e->getMessage());
    }


    echo json_encode($res);
}

function SRegistermgr ($data) {

    session_start();
    $result = "";
  
    //$json = file_get_contents('php://input');
    // $arr = json_decode($data, true); 
    // $row = $arr['item'];
    
    $id       = $data['items']['id'];
    $name     = $data['items']['name'];
    $password = $data['items']['password'];
    $mobile   = $data['items']['mobile'];
    $addr     = $data['items']['addr'];
    $zipcode  = $data['items']['zipcode'];
    $idrolebm = $data['items']['idrolebm'];
    $mid      = $data['items']['mid'];
    $role     = 2;
    $error="";
    
    try {
        global $conn;
    
        $sqlstring = "insert into eplat_user (id, name, password, mobile, addr, zipcode, role, mid) 
                    values ( '{$id}', '{$name}','{$password}', '{$mobile} ','{$addr}', '{$zipcode}', $role, '{$mid}' )";
    
        $res = mysqli_query ( $conn, $sqlstring);
    
        $conn->close();
    }
    catch (Exception $e) 
    {
        $error = $e->getMessage();
    }
    
    //header('Content-Type: application/json');
    if ($res === TRUE) {
        $result = json_encode(  array( "success: " => " !!" ) );

    } else {
        $result = json_encode(  array( "Error: " => $error ) );
    }
    echo  $result ;
}

function SShowConfirm($data) {
    session_start();

    $num = $data['num'];

    global $conn;

    $sqlString = "SELECT *  FROM eplat_user where role = 1"; 

    if ( $num == "2")
        $sqlString = "SELECT *  FROM eplat_user where role = 1 and confirm = 0"; 
    else if ( $num == "1")
        $sqlString = "SELECT *  FROM eplat_user where role = 1 and confirm = 1"; 

        
    $rs = mysqli_query($conn,$sqlString);
    $rows = array();

    $i = 0;

    try {

        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
            array(  'id'        => $row['id'],
            'name'      => $row['name'] ,
            'password'  => $row['password'],								
            'mobile'    => $row['mobile'],								
            'addr'      => $row['addr'],								
            'zipcode'   => $row['zipcode'],								
            'confirm'   => $row['confirm'],								
            'rdate'     => $row['rdate'],								
        ));
    }
    $conn->close();
    }
    catch (Exception $e) {
        json_encode( $e->getMessage() );
    }


    header('Content-Type: application/json');
    echo json_encode($rows);

}

function SShowConfirmUpdate ($data) {
    session_start();

    // $json = file_get_contents('php://input');
    // $arr = json_decode($json, true);

    $arr = $data;

    $id="";
    global $conn;
    $result = "";

    try {
        foreach ( $arr['items'] as $row) {
            $sql = "UPDATE eplat_user SET id = '".$row['id']."'
            ,name = '".$row['name']."' 
            ,password = '".$row['password']."' 
            ,mobile = '".$row['mobile']."' 
            ,addr = '".$row['addr']."' 
            ,zipcode = '".$row['zipcode']."' 
            ,confirm = ".$row['confirm']." 
            WHERE id = '".$row['id']."'";
            if ($conn->query($sql) === TRUE) {
                $result = true;
            } 
        }

        $conn->close();
    }
    catch (Exception $e) {
        $result = $e.getMessage();
    }

    header('Content-Type: application/json');

    echo json_encode(  array( "result: " => $result ) );
}

function SShowStudentList ($data) {
    session_start();
    
    global $conn;
    $pid = $data['id'];
    $classnm = $data['classnm'];

    $sqlString = "SELECT *  FROM eplat_user where pid = '{$pid}' and classnm = '{$classnm}'"; 
    $rows = array();
    $i = 0;
        
    try {
        
        $rs = mysqli_query($conn,$sqlString);
        
        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
            array(  'Id'      => $row['id'],
                    'Name'  => $row['name'] ,
                    'Passwd'   => $row['password'],								
                    // 'addr'    => $row['addr'],								
                    // 'mobile'  => $row['mobile'],								
                    'rdate'   => $row['rdate'],								
                    // 'confirm' => $row['confirm'],															
            ));
        }
        $conn->close();
    }
    catch (Exception $e)
    {
        echo  json_encode( array("error:" => $e->getMessage()) );
    }

    header('Content-Type: application/json');
    echo json_encode( array ("json" => $rows) );
}

function SShowClassList ($data) {
    session_start();

    $pid = $data['id'];

    global $conn;

    $sqlString = "select unique(classnm) classnm from eplat_user where pid = '{$pid}'"; 

    $rows = array();

    $i = 0;
        
    try {
        
        $rs = mysqli_query($conn,$sqlString);
        
        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
                array(  'classnm'      => $row['classnm'],													
            ));
        }
        $conn->close();
    }
    catch (Exception $e)
    {
        echo  json_encode( array("error:" => $e->getMessage()) );
    }

    header('Content-Type: application/json');
    echo json_encode($rows);
}

function SinsertStudent($data) {
    
    global $location;
    global $conn;

    session_start();
    
    // $json = file_get_contents('php://input');
    
    // $arr = json_decode($json, true);

    $id="";
    $result="";
    
    try {
    
        foreach ( $data['items'] as $row) {
            
            $id = $row['id'];
            $name = $row['name'];
            $password = $row['passwd'];
            $pid = $row['tid'];
            $classnm = $row['classnm'];
    
            $sql = "insert into eplat_user (id, name, password, role, pid, classnm, rdate) 
                    values ('{$id}', '{$name}','{$password}', 0 , '{$pid}', '{$classnm}', now())";
    
            if ($conn->query($sql) === TRUE) {
                $result =  "New record created successfully";
            } else {
                $result =  "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        $conn->close();
    }
    catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
    
    echo json_encode($result);
}

function SUploadBoardPDF($data) {
    session_start();

	$id = $data['id'];
	$porlist = $data['postlist'];
	$porid = $data['porid'];

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

}

function SUploadBoard ($data) {
    session_start();
    $content   = $data['idContent'];
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
        try {
    
            $sqlstring = "insert into repository ( title, id, contents, rdate ) values ( '$content', '$user',  '$jsarr',  NOW())";
            $res = mysqli_query ( $conn,  $sqlstring);
            
            if ($res=== TRUE) {
                $result = true;
            } else {
                $result =  "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
        }
        catch ( Exception $e)
        {
            echo json_encode( array ("error:" => $e->getMessage() ));
        }
    
        echo json_encode( array ("result:" => $result )) ;
    }
    else 
    {
        Header("Location: login.php");
    }
}

function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
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