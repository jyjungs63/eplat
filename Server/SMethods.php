<?php

require_once 'dbinit.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['functionName'] )) {
        $functionName = $_POST['functionName'];

        if (is_callable($functionName)) {
            $functionName($_POST['otherData']);
        }  
        
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
    
    $pid       = $data['id'];
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
?>