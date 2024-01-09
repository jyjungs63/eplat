<?php

require_once 'dbinit.php';

$urlFromGET = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['functionName'] )) {
        $functionName = $_POST['functionName'];

        if (isset($_GET['dest'])) {
            $urlFromGET = $_GET['dest']; 
        }

        if (is_callable($functionName)) {
            if ( "SUploadBoardPDF" == $functionName 
                || "SUploadBoard" == $functionName 
                || "Sfindpassword"== $functionName  )
                $functionName($_POST);
            else if ("Slogon" == $functionName || "SRegister" == $functionName)
                $functionName($_POST,$urlFromGET);
            else
                $functionName($_POST['otherData']);
        }          
    }
}
function Sfindpassword($data)
{
    $Id     = $data["id"];
    $Mobile = $data["mobile"];
    
        if ( !empty($Id) && !empty($Mobile) ) {
            
            $res = CheckPasswd( $Id, $Mobile);
            
            if( $res ) {
                //echo json_encode($res['id']);
                session_start();
                $_SESSION["id"]       = $Id ;			
                $_SESSION["password"] = $res['password'];
                echo json_encode( array ("success" => $res['password']) );
                //header('location: ../login/login.php?id='.$_SESSION["password"]);  
            }
            else {
                //hearder("Location: login.php");
                echo json_encode(array ("error" => "사용자 아이디 와 휴대폰 번호가 일치하지 않아요"));
            }
        }
        else {
            //header("Location: login.php");
            echo json_encode(array ("error" => "사용자 아이디 와 휴대폰을 입력하세요"));
        }
    
}
function CheckPasswd($login, $password) {
    global $conn;
    $user = "";
    $login = mysqli_escape_string ( $conn, $login );
    $rs = mysqli_query ( $conn, "select * from eplat_user where id='{$login}' and mobile = '{$password}' " );
    
    if ($rs) {
        $user = mysqli_fetch_assoc ( $rs );
        $passwordnew = mysqli_escape_string ( $conn, password_hash ( $password, PASSWORD_BCRYPT ) );
        //if ($user &&  password_verify ( $password, $user ['password'] ) != true) {
        mysqli_free_result ( $rs );
    }
    $conn->close();
    return $user;
}

function Slogon($data, $dest)
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
            $_SESSION["dest"] = $dest;
            
			if ($dest == "classroom") {
				echo json_encode(array('success' => '../welcome.php?dest='.'classroom' ));  
			}
			else
            {               
				echo json_encode(array('success' => '../index_admin.php?id='.$_SESSION["user"]));  
            }        
		}
		else {
			//hearder("Location: login.php");
			echo json_encode(array('falure' => 'password mismatch'));
		}
	}
	else {
		//header("Location: login.php");
		echo json_encode(array('falure' => 'id or password empty!'));
	}
}

function CheckUser($login, $password) {
    global $conn;
    $user = "";
    $login = mysqli_escape_string ( $conn, $login );
    $rs = mysqli_query ( $conn, "select * from eplat_user where id='{$login}'" );
    
    if ($rs) {
        $user = mysqli_fetch_assoc ( $rs );
        $passwordnew = mysqli_escape_string ( $conn, password_hash ( $password, PASSWORD_BCRYPT ) );
        //if ($user &&  password_verify ( $password, $user ['password'] ) != true) {
        if ($user &&  strcmp( $password, $user ['password'] ) != 0) {
            $user = "";
        }
        mysqli_free_result ( $rs );
    }
    $conn->close();
    return $user;
}

function SRegister ($data, $dest) {

    $id       = $data['id'];
    $name     = $data['name'];
    $password = $data['password'];
    $mobile   = $data['mobile'];
    $addr     = $data['addr'];
    $zipcode  = $data['zipcode'];

    $role = 0;
    if ( isset($data['idrolebm']) )   // 지사장
        $role = 1;
    if ( isset($data['idrolet']) )     // 원장, 선생님
        $role = 2;
    if ( isset($data['idroleother']) )     // 일반 유료 회원
        $role = 3;
           
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
        //header('location: ../login/login.php');
        echo json_encode(array('success' => '../login/login.php' )); 
    }
     else {
        $result = json_encode(  array( "falure: " => $conn->error ) );
        echo $result;
    }
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
function SPorDetailListRange ($data) {
    session_start();

    global $conn;
    
    $start  = $data['start'];
    $end    = $data['end'];

    $rows = array();
    $i = 0;
    $res = "";
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = "select * from eplat_porlist where rdate between '{$start}' and '{$end}' ";
    
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

        if ( $role == "va")
            $sqlString = "SELECT * FROM eplat_user where mid = '".$id."'"; 
        else if (  $role == "v4")
            $sqlString = "SELECT * FROM eplat_user where role = 1 and mid = '".$id."'"; 
        else 
            $sqlString = "SELECT * FROM eplat_user where role = 2 and mid = '".$id."'"; 
            
        $rs = mysqli_query($conn,$sqlString);
        $rows = array();

        $i = 0;

        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
                    array(  'id'        => $row['id'],
                            'name'      => $row['name'] ,
                            'owner'     => $row['owner'] ,
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

function SDeleteChild ($data) {
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
    $owner     = $data['items']['owner'];
    $password = $data['items']['password'];
    $mobile   = $data['items']['mobile'];
    $addr     = $data['items']['addr'];
    $zipcode  = $data['items']['zipcode'];
    // $idrolebm = $data['items']['idrolebm'];
    $mid      = $data['items']['mid'];
    $role     = $data['items']['role'];
    $error="";
    
    try {
        global $conn;
    
        $sqlstring = "insert into eplat_user (id, name,owner, password, mobile, addr, zipcode, role, mid, confirm) 
                    values ( '{$id}', '{$name}','{$owner}', '{$password}', '{$mobile} ','{$addr}', '{$zipcode}', $role, '{$mid}', 1 )";
    
        $res = mysqli_query ( $conn, $sqlstring);
    
        $conn->close();
    }
    catch (Exception $e) 
    {
        $error = $e->getMessage();
    }
    
    header('Content-Type: application/json');
    if ($res === TRUE) {
        echo json_encode(  array( "success" => $res) );

    } else {
        echo json_encode(  array( "Error" => $error ) );
    }
}

function SShowConfirm($data) {
    session_start();

    $num = $data['num'];

    global $conn;

    $sqlString = "SELECT *  FROM eplat_user where role = 1 or role  = 2"; 

    if ( $num == "2")
        $sqlString = "SELECT *  FROM eplat_user where (role = 1 or role  = 2) and confirm = 0"; 
    else if ( $num == "1")
        $sqlString = "SELECT *  FROM eplat_user where (role = 1 or role  = 2)  and confirm = 1"; 

        
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
            'role'	    => $row['role'],							
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
        $result = $e->getMessage();
    }

    header('Content-Type: application/json');

    echo json_encode(  array( "result: " => $result ) );
}

function SShowStudentList ($data) {
    session_start();
    
    global $conn;
    $tid = $data['id'];
    $step = $data['step'];

    if ($step == '전체')
        $sqlString = "SELECT *  FROM eplat_user where tid = '{$tid}' "; 
    else
        $sqlString = "SELECT *  FROM eplat_user where tid = '{$tid}' and step = '{$step}'"; 

    $rows = array();

    $i = 0;
        
    try {
        
        $rs = mysqli_query($conn,$sqlString);
        
        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
            array(  'id'      => $row['id'],
                    'name'  => $row['name'] ,
                    'passwd'   => $row['password'],								
                    'step'    => $row['step'],								
                    // 'mobile'  => $row['mobile'],								
                    'rdate'   => $row['rdate'],								
                    'classnm' => $row['classnm'],																												
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

    $tid = $data['id'];

    global $conn;

    $sqlString = "select unique(classnm) classnm from eplat_user where tid = '{$tid}'"; 

    $rows = array();

    $i = 0;
        
    try {
        
        $rs = mysqli_query($conn,$sqlString);
        
        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
                array(  'classnm'    => $row['classnm'],													
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
            $tid = $row['tid'];
            $classnm = $row['classnm'];
            $step = $row['step'];
            $role = 0;
            $confirm = 1;
            $sql = "insert into eplat_user (id, name, password, role, tid, classnm, rdate, step, confirm) 
                    values ('{$id}', '{$name}','{$password}', {$role} , '{$tid}', '{$classnm}', now(), '{$step}' , {$confirm} )";
    
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
	$porid  = $data['porid'];
	$addr   = $data['addr'];
	$mobile = $data['mobile'];
	$order  = $data['order'];
	$zip    = $data['zip'];

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

		$sqlstring = "insert into eplat_porlist ( id, por_id, por_list, rdate, order, addr, mobile )
                       values ( '{$id}', '{$porid}',  '{$porlist}',  NOW() , '{$order}', '{$addr}', '{$mobile}' )";
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
    $desc   = $data['idDesc'];
    
    $user =  'admin';
    
    global $conn;
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
    
            $sqlstring = "insert into repository ( title, id, contents, desc, rdate ) values ( '$content', '$user',  '$jsarr', '$desc',  NOW())";
            $res = mysqli_query ( $conn,  $sqlstring);
            
            if ($res=== TRUE) {
                $result = true;
            } else {
                $result =  "Error: " . $sqlstring . "<br>" . $conn->error;
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

function SShowBoardList($data) {
    session_start();

    $num = $data['num'];

    global $conn;

    try {
        if ( $num == -1) {
            $sqlString = "SELECT num, title, id, contents, `desc`, rdate  FROM repository order by num desc"; 
        }
        else
            $sqlString = "SELECT num, title, id, contents, `desc`, rdate  FROM repository where num =". $num ." order by num desc"; 

        $rs = mysqli_query($conn,$sqlString);
        $rows = array();

        $i = 0;

        while($row = mysqli_fetch_array($rs)){
            array_push($rows,
                    array(  'num'      => $row['num'],
                            'title'    => $row['title'] ,
                            'id'       => $row['id'],								
                            'contents' => $row['contents'],								
                            'desc'     => $row['desc'],								
                            'rdate'    => $row['rdate'],								
                    ));
        }
    }
    catch (Exception $e)
    {
        return json_encode( $e->getMessage() );
    }

    $result["rows"] = $rows;
    header('Content-Type: application/json');
    echo json_encode($rows);

}

function SDeleteBoardlist($data)
{
    session_start();

    $num  = $data["num"][0];

    global $conn;
    $res="";
    $rows = array();
    $cont="";

    try {
        $sql = "SELECT contents from repository WHERE num = ".$num."";

        $rs = mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_array($rs)){
            $cont =  $row['contents'];												
        }
        $jsobj = json_decode($cont, true);

        if ( $jsobj !== null ) {
            $arrlen = count( $jsobj);
            for ( $i=0; $i < $arrlen ; $i++) {
                if ( unlink('../board/uploads/'.$jsobj[$i]['fakename']) ) {
                    $res = true;
                } else {
                    $res = false;
                }         
            }
        }

        $sql = "DELETE FROM repository WHERE num = '".$num."'";
        
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