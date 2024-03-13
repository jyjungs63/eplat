<?php

require_once 'dbinit.php';

$urlFromGET = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['functionName'])) {
        $functionName = $_POST['functionName'];

        if (isset($_GET['dest'])) {
            $urlFromGET = $_GET['dest'];
        }

        if (is_callable($functionName)) {
            if (
                "SUploadBoardPDF" == $functionName
                || "SUploadBoard" == $functionName
                || "Sfindpassword" == $functionName
            )
                $functionName($_POST);
            else if ("Slogon" == $functionName || "SRegister" == $functionName)
                $functionName($_POST, $urlFromGET);
            else
                $functionName($_POST['otherData']);
        }
    }
}
function Sfindpassword($data)
{
    $Id     = $data["id"];
    $Mobile = $data["mobile"];

    if (!empty($Id) && !empty($Mobile)) {

        $res = CheckPasswd($Id, $Mobile);

        if ($res) {
            //echo json_encode($res['id']);
            // session_start();
            // $_SESSION["id"]       = $Id;
            // $_SESSION["password"] = $res['password'];

            $characterToRemove = "-";
            $passwd1 = str_replace(' ', '', str_replace($characterToRemove, "", $res['mobile']));
            $passwd2 = str_replace(' ', '', str_replace($characterToRemove, "", $Mobile));
            if ($passwd1 == $passwd2)
                echo json_encode(array("success" => $res['password']));
            else
                echo json_encode(array("error" => "사용자 아이디 와 휴대폰 번호가 일치하지 않아요"), JSON_UNESCAPED_UNICODE);
            //header('location: ../login/login.php?id='.$_SESSION["password"]);  
        } else {
            //hearder("Location: login.php");
            echo json_encode(array("error" => "사용자 아이디 와 휴대폰 번호가 일치하지 않아요"), JSON_UNESCAPED_UNICODE);
        }
    } else {
        //header("Location: login.php");
        echo json_encode(array("error" => "사용자 아이디 와 휴대폰을 입력하세요"), JSON_UNESCAPED_UNICODE);
    }
}
function CheckPasswd($login, $password)
{
    global $conn;
    $user = "";
    $login = mysqli_escape_string($conn, $login);
    //$rs = mysqli_query($conn, "select * from eplat_user where id='{$login}' and mobile = '{$password}' ");
    $rs = mysqli_query($conn, "select * from eplat_user where id='{$login}' ");

    if ($rs) {
        $user = mysqli_fetch_assoc($rs);
        $passwordnew = mysqli_escape_string($conn, password_hash($password, PASSWORD_BCRYPT));
        //if ($user &&  password_verify ( $password, $user ['password'] ) != true) {
        mysqli_free_result($rs);
    }
    $conn->close();
    return $user;
}

function Slogon($data, $dest)
{
    $Email    = $data["Email"];
    $Password = $data["Password"];
    global $location;

    //$dest = "classroom";
    $rows = array();

    if (!empty($Email) && !empty($Password)) {

        $res = CheckUser($Email, $Password);

        if ($res) {
            session_start();
            $_SESSION["authenticated"] = 'true';
            $_SESSION["user"] = $res['id'];
            $_SESSION["name"] = $res['name'];
            $_SESSION["role"] = $res['role'];
            $_SESSION["confirm"] = $res['confirm'];
            $_SESSION["location"] = $location;
            $_SESSION["dest"] = $dest;

            array_push(
                $rows,
                array(
                    'authenticated'   => 'true',
                    'user' => $res['id'],
                    'name' => $res['name'],
                    'owner' => $res['owner'],
                    'role' => $res['role'],
                    'confirm'  => $res['confirm'],
                    'location'  => $location,
                    'dest'  => $dest
                )
            );

            echo json_encode(array('success' => $rows));
        } else {
            //hearder("Location: login.php");
            echo json_encode(array('falure' => 'password mismatch'));
        }
    } else {
        //header("Location: login.php");
        echo json_encode(array('falure' => 'id or password empty!'));
    }
}
function SetLogin($id)
{
    global $conn;
    try {
        $sql = "UPDATE eplat_user SET logstat = 1 , logdate = now()  WHERE id = '{$id}' ";
        if ($conn->query($sql) === TRUE) {
            $result = true;
        }
        $conn->close();
    } catch (Exception $e) {
        $result = $e->getMessage();
    }
}

function CheckUser2($login)
{
    global $conn;
    $user = "";
    $login = mysqli_escape_string($conn, $login);
    $rs = mysqli_query($conn, "select * from eplat_user where id='{$login}'");

    if ($rs) {
        $user = mysqli_fetch_assoc($rs);
        mysqli_free_result($rs);
    }
    $conn->close();
    return $user;
}

function CheckUser($login, $password)
{
    global $conn;
    $user = "";
    $login = mysqli_escape_string($conn, $login);
    $rs = mysqli_query($conn, "select * from eplat_user where id='{$login}'");

    if ($rs) {
        $user = mysqli_fetch_assoc($rs);
        $passwordnew = mysqli_escape_string($conn, password_hash($password, PASSWORD_BCRYPT));
        //if ($user &&  password_verify ( $password, $user ['password'] ) != true) {
        if ($user &&  strcmp($password, $user['password']) != 0) {
            $user = "";
        }
        mysqli_free_result($rs);
    }
    $conn->close();
    return $user;
}


function SRegister($data, $dest)
{

    $id       = $data['id'];
    $name     = $data['name'];
    $password = $data['password'];
    $mobile   = $data['mobile'];
    $addr     = $data['addr'];
    $zipcode  = $data['zipcode'];

    $role = 0;
    if (isset($data['idrolebm']))   // 지사장
        $role = 1;
    if (isset($data['idrolet']))     // 원장, 선생님
        $role = 2;
    if (isset($data['idroleother']))     // 일반 유료 회원
        $role = 3;

    global $conn;

    try {

        $id = mysqli_escape_string($conn, $id);
        //$passwordnew = mysqli_escape_string ( $conn, password_hash ( $password, PASSWORD_BCRYPT ) );

        $sqlstring = "insert into eplat_user (id, name, password, mobile, addr, zipcode, role) 
        values ( '{$id}', '{$name}','{$password}', '{$mobile} ','{$addr}', '{$zipcode}', $role )";

        $res = mysqli_query($conn, $sqlstring);

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    header('Content-Type: application/json');
    if ($res === TRUE) {
        $result = true;
        //header('location: ../login/login.php');
        echo json_encode(array('success' => '../login/login.php'));
    } else {
        $result = json_encode(array("falure: " => $conn->error));
        echo $result;
    }
}



function SShowOrderList($data)
{

    session_start();

    $id = $data['id'];

    global $conn;

    //$sqlString = "SELECT p.*, u.name FROM eplat_porlist p eplat_user u where confirm = 0";
    if ($id == "admin")
        $sqlString = "SELECT p.*, u.owner bname FROM eplat_porlist p , eplat_user u where u.id = p.id ";
        //$sqlString = "SELECT p.*, u.owner bname FROM eplat_porlist p , eplat_user u where u.id = p.id and p.confirm = 0";
    else
        $sqlString = "SELECT p.*, u.owner bname FROM eplat_porlist p , eplat_user u where u.id = p.id and  u.id = '{$id}'";
        //$sqlString = "SELECT p.*, u.owner bname FROM eplat_porlist p , eplat_user u where u.id = p.id and p.confirm = 0 and u.id = '{$id}'";

    $rows = array();

    $i = 0;

    try {

        $rs = mysqli_query($conn, $sqlString);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'          => $row['id'],
                    'por_id'      => $row['por_id'],
                    'order'       => $row['order'],
                    'addr'        => $row['addr'],
                    'mobile'      => $row['mobile'],
                    'rdate'       => $row['rdate'],
                    'confirm'     => $row['confirm'],
                    'bname'      => $row['bname'],
                )
            );
        }
        $conn->close();
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    header('Content-Type: application/json');
    echo json_encode($rows);
}

function SPorDetailList($data)
{
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

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'   => $row['id'],
                    'json' => $row['por_list'],
                    'order' => $row['order'],
                    'rdate' => $row['rdate'],
                    'addr'  => $row['addr'],
                    'mobile'  => $row['mobile'],
                    'zip'  => $row['zip'],
                    'confirm'  => $row['confirm'],
                    'pdfname' => $row['pdfname']
                )
            );
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    header('Content-Type: application/json');
    echo json_encode($rows);
}

function SPorDetailListRange($data)
{
    session_start();

    global $conn;

    $id     = $data['id'];
    $name   = $data['name'];
    $start  = $data['start'];
    $end    = $data['end'];

    $rows = array();
    $ret  = array();
    $i = 0;
    $res = "";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $tsql = "select p.*, u.owner owner from eplat_porlist p ,  eplat_user u  where u.id = p.id and ";


    if ($name == "전지사")
        $stmt = $tsql . "p.rdate between '{$start}' and '{$end}' order by id , rdate desc";

    else if ($name == "전유치원")
        $stmt = $tsql . "u.id = '{$id}' and p.rdate between '{$start}' and '{$end}' order by p.id, rdate desc";

    else {
        if ($id != "admin")
            $stmt = $tsql . " p.rdate between '{$start}' and '{$end}' order by p.id, rdate desc";
        else
            $stmt = $tsql . "p.id = '{$name}' and p.rdate between '{$start}' and '{$end}' order by p.id, rdate desc";
    }

    try {

        $rs = mysqli_query($conn, $stmt);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'   => $row['id'],
                    'json' => $row['por_list'],
                    'order' => $row['order'],
                    'rdate' => $row['rdate'],
                    'addr'  => $row['addr'],
                    'mobile'  => $row['mobile'],
                    'confirm'  => $row['confirm'],
                    'uname'  => $row['owner']
                )
            );
        }
        array_push($ret,  array('list' => $rows));
        $nstart = substr($start, 0, 7);
        $stmt = "select * from eplat_parcel where  DATE_FORMAT(`date`,'%Y-%m') = '{$nstart}' ";
        if ($id != "전지사")
            $stmt = "select * from eplat_parcel where id='{$id}' and DATE_FORMAT(`date`,'%Y-%m') = '{$nstart}' ";

        $rs1 = mysqli_query($conn, $stmt);
        $rows = [];
        while ($row = mysqli_fetch_array($rs1)) {
            array_push(
                $rows,
                array(
                    'id'     => $row['id'],
                    'name'   => $row['name'],
                    'date'   => $row['date'],
                    'price'  => $row['price']
                )
            );
        }
        array_push($ret,  array('parcel' => $rows));
        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    header('Content-Type: application/json');
    //echo json_encode($rows);
    echo json_encode($ret);
}

function SPorAddParcel($data)
{
    $start    = $data['start'];
    $id       = $data['id'];
    $name     = $data['name'];
    $price    = $data['price'];

    try {
        global $conn;
        $res = "";

        // check id, date exist

        //$stmt = "select * from eplat_parcel where id='{$id}' and DATE_FORMAT(`date`,'%Y-%m') = '{$start}' ";
        $stmt = "select * from eplat_parcel where id='{$id}' and `date` = '{$start} 00:00:00' ";

        $rs1 = mysqli_query($conn, $stmt);

        if ($rs1->num_rows > 0) {
            $sql = "UPDATE eplat_parcel SET price =  {$price}  WHERE  id = '{$id}' and  `date` = '{$start} 00:00:00'";
            //$sql = "UPDATE eplat_parcel SET price =  {$price}  WHERE  id = '{$id}' and  DATE_FORMAT(`date`,'%Y-%m') = '{$start}'";
            $res = $conn->query($sql);
        } // update
        else {
            $sqlstring = "insert into eplat_parcel (id, name, price) 
            values ( '{$id}', '{$name}',{$price} )";
            if ($start != "")
                $sqlstring = "insert into eplat_parcel (id, name, price, `date`) 
            values ( '{$id}', '{$name}', {$price}, '{$start}' )";

            $res = mysqli_query($conn, $sqlstring);
        }

        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    header('Content-Type: application/json');
    if ($res === TRUE) {
        echo json_encode(array("success" => $res));
    } else {
        echo json_encode(array("Error" => $error));
    }
}

function SShowMgr($data)
{
    session_start();

    global $conn;

    $role = $data['role'];
    $id   = $data['id'];

    try {

        if ($role == "va") {
            if ($id == 'admin')
                $sqlString = "SELECT * FROM eplat_user";
            else
                $sqlString = "SELECT * FROM eplat_user where mid = '" . $id . "'";
        } else if ($role == "v4")
            $sqlString = "SELECT * FROM eplat_user where role = 1 and mid = '" . $id . "'";
        else
            $sqlString = "SELECT * FROM eplat_user where role = 2 and mid = '" . $id . "'";

        $rs = mysqli_query($conn, $sqlString);
        $rows = array();

        $i = 0;

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'        => $row['id'],
                    'name'      => $row['name'],
                    'owner'     => $row['owner'],
                    'password'  => $row['password'],
                    'mobile'    => $row['mobile'],
                    'addr'      => $row['addr'],
                    'zipcode'   => $row['zipcode'],
                    'confirm'   => $row['confirm'],
                    'rdate'     => $row['rdate'],
                    'role'     => $row['role'],
                )
            );
        }
        $conn->close();
        $result["rows"] = $rows;

        header('Content-Type: application/json');
        echo json_encode(array("success" => $rows));
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(array("Error: " => $e->getMessage()));
    }
}

function SShowAddr($data)
{
    session_start();

    global $conn;

    $id   = $data['id'];

    try {


        $sqlString = "SELECT * FROM eplat_addrlist where mid = '" . $id . "'  order by rdate desc";


        $rs = mysqli_query($conn, $sqlString);
        $rows = array();

        $i = 0;

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'        => $row['id'],
                    'name'      => $row['name'],
                    'owner'     => $row['owner'],
                    'mobile'    => $row['mobile'],
                    'addr'      => $row['addr'],
                    'zipcode'   => $row['zipcode'],
                    'rdate'     => $row['rdate'],
                )
            );
        }

        $sqlString2 = "SELECT * FROM eplat_user where mid = '" . $id . "'";
        $rs = mysqli_query($conn, $sqlString2);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'        => $row['id'],
                    'name'      => $row['name'],
                    'owner'     => $row['owner'],
                    'mobile'    => $row['mobile'],
                    'addr'      => $row['addr'],
                    'zipcode'   => $row['zipcode'],
                    'rdate'     => $row['rdate'],
                )
            );
        }

        $conn->close();
        $result["rows"] = $rows;

        header('Content-Type: application/json');
        echo json_encode(array("success" => $rows));
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(array("Error: " => $e->getMessage()));
    }
}

function SRemoveChild($data)
{
    session_start();

    $id  = $data["id"];

    global $conn;
    $res = "";

    try {

        $sql = "DELETE FROM eplat_user WHERE id = '" . $id . "'";

        if ($conn->query($sql) === TRUE) {
            $res = true;
        } else {
            $res =  json_encode(array("Error deleting record: " . $conn->error));
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    echo json_encode($res);
}

function SRemoveAddress($data)    // 프로그램 update 필요함
{
    session_start();

    $id  = $data["id"];

    global $conn;
    $res = "";

    try {

        $sql = "DELETE FROM eplat_addrlist WHERE id = '" . $id . "'";

        if ($conn->query($sql) === TRUE) {
            $res = true;
        } else {
            $res =  json_encode(array("Error deleting record: " . $conn->error));
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    echo json_encode($res);
}

function SRemovPorID($data)    // 프로그램 update 필요함
{
    //session_start();

    $id  = $data["id"];
    $pdf = $data["pdfname"];

    global $conn;
    $res = "";

    try {

        $sql = "DELETE FROM eplat_porlist WHERE por_id = '" . $id . "'";

        if ($conn->query($sql) === TRUE) {
            $res = true;
            if (file_exists('../Server/uploads/' . $pdf)) {
                if (unlink('../Server/uploads/' . $pdf)) {
                    $res = true;
                } else {
                    $res = false;
                }
            }
        } else {
            $res =  json_encode(array("Error deleting record: " . $conn->error));
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    echo json_encode($res);
}

function SAddDelever($data)    // 프로그램 update 필요함
{
    //session_start();

    $id  = $data["id"];

    global $conn;
    $res = "";

    try {

        $sql = "UPDATE eplat_porlist SET confirm = 1  WHERE  por_id = '{$id}'";

        if ($conn->query($sql) === TRUE) {
            $res = true;
        }

        $conn->close();
    } catch (Exception $e) {
        $res = $e->getMessage();
    }

    echo json_encode($res);
}

function SDeleteMgr($data)
{
    session_start();

    $id  = $data["id"];

    global $conn;
    $res = "";

    try {

        $sql = "DELETE FROM eplat_user WHERE id = '" . $id . "'";

        if ($conn->query($sql) === TRUE) {
            $res = true;
        } else {
            $res =  json_encode(array("Error deleting record: " . $conn->error));
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }


    echo json_encode($res);
}

function SRegistermgr($data)
{

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
    $confirm = 1;
    if (isset($data['items']['confirm']))
        $confirm = (int) $data['items']['confirm'];
    $error = "";

    try {
        global $conn;

        $sqlstring = "insert into eplat_user (id, name,owner, password, mobile, addr, zipcode, role, mid, confirm) 
                    values ( '{$id}', '{$name}','{$owner}', '{$password}', '{$mobile} ','{$addr}', '{$zipcode}', $role, '{$mid}', $confirm )";

        $res = mysqli_query($conn, $sqlstring);

        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    header('Content-Type: application/json');
    if ($res === TRUE) {
        echo json_encode(array("success" => $res));
    } else {
        echo json_encode(array("Error" => $error));
    }
}

function SRegistermgr2($data)
{

    session_start();
    $result = "";

    //$json = file_get_contents('php://input');
    // $arr = json_decode($data, true); 
    // $row = $arr['item'];

    //$id       = $data['items']['id'];
    $name     = $data['items']['name'];
    $owner     = $data['items']['owner'];
    //$password = $data['items']['password'];
    $mobile   = $data['items']['mobile'];
    $addr     = $data['items']['addr'];
    $zipcode  = $data['items']['zipcode'];
    // $idrolebm = $data['items']['idrolebm'];
    $mid      = $data['items']['mid'];
    //$role     = $data['items']['role'];

    $error = "";

    try {
        global $conn;

        $sqlstring = "insert into eplat_addrlist ( name, owner,  mobile, addr, zipcode,  mid ) 
                    values (  '{$name}','{$owner}', '{$mobile} ','{$addr}', '{$zipcode}',  '{$mid}' )";

        $res = mysqli_query($conn, $sqlstring);

        $conn->close();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    header('Content-Type: application/json');
    if ($res === TRUE) {
        echo json_encode(array("success" => $res));
    } else {
        echo json_encode(array("Error" => $error));
    }
}

function SShowConfirm($data)
{
    session_start();

    $num = $data['num'];

    global $conn;

    $sqlString = "SELECT *  FROM eplat_user where role = 1 or role  = 2 order by rdate desc";

    if ($num == "2")
        $sqlString = "SELECT *  FROM eplat_user where (role = 1 or role  = 2) and confirm = 0 order by rdate desc";
    else if ($num == "1")
        $sqlString = "SELECT *  FROM eplat_user where (role = 1 or role  = 2)  and confirm = 1 order by rdate desc";


    $rs = mysqli_query($conn, $sqlString);
    $rows = array();

    $i = 0;

    try {

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'        => $row['id'],
                    'name'      => $row['name'],
                    'password'  => $row['password'],
                    'mobile'    => $row['mobile'],
                    'addr'      => $row['addr'],
                    'zipcode'   => $row['zipcode'],
                    'confirm'   => $row['confirm'],
                    'rdate'     => $row['rdate'],
                    'role'        => $row['role'],
                )
            );
        }
        $conn->close();
    } catch (Exception $e) {
        json_encode($e->getMessage());
    }


    header('Content-Type: application/json');
    echo json_encode($rows);
}

function SShowConfirmUpdate($data)
{
    session_start();

    // $json = file_get_contents('php://input');
    // $arr = json_decode($json, true);

    $arr = $data;

    $id = "";
    global $conn;
    $result = "";

    try {
        foreach ($arr['items'] as $row) {
            $sql = "UPDATE eplat_user SET id = '" . $row['id'] . "'
            ,name = '" . $row['name'] . "' 
            ,owner = '" . $row['owner'] . "' 
            ,password = '" . $row['password'] . "' 
            ,mobile = '" . $row['mobile'] . "' 
            ,addr = '" . $row['addr'] . "' 
            ,zipcode = '" . $row['zipcode'] . "' 
            ,confirm = " . $row['confirm'] . " 
            WHERE id = '" . $row['id'] . "'";
            if ($conn->query($sql) === TRUE) {
                $result = true;
            }
        }

        $conn->close();
    } catch (Exception $e) {
        $result = $e->getMessage();
    }

    header('Content-Type: application/json');

    echo json_encode(array("result: " => $result));
}

function SShowConfirmUpdatePOR($data)
{
    session_start();

    // $json = file_get_contents('php://input');
    // $arr = json_decode($json, true);

    $arr = $data;
    global $conn;
    $result = "";

    try {

        $id = $arr['data']['id'];
        $por_id = $arr['data']['porid'];
        $sql = "UPDATE eplat_porlist SET confirm = 1  WHERE  por_id = '{$por_id}'";

        if ($conn->query($sql) === TRUE) {
            $result = true;
        }


        $conn->close();
    } catch (Exception $e) {
        $result = $e->getMessage();
    }

    header('Content-Type: application/json');

    echo json_encode(array("result: " => $result));
}

function SShowStudentList($data)
{
    session_start();

    global $conn;
    $tid = $data['id'];
    $step = $data['step'];
    $sel = $data['sel'];
    if (isset($data['kgarden']))   //
        $kgarden    = $data['kgarden'];


    if ($tid == "admin") {
        if ($sel == '1') {
            if ($step == '전체')
                $sqlString = "SELECT *  FROM eplat_user where  role = 0";
            else
                //$sqlString = "SELECT *  FROM eplat_user where  step = '{$step}' and role = 0 and tid='{$kgarden}'";
                $sqlString = "SELECT *  FROM eplat_user au, (select id from eplat_user where owner = '{$kgarden}') u where u.id = au.tid and role = 0 and step='{$step}'";
        } else if ($sel == '2') {

            //$sqlString = "SELECT *  FROM eplat_user where classnm = '{$step}' and role = 0 and tid='{$kgarden}'";
            $sqlString = "SELECT *  FROM eplat_user au, (select id from eplat_user where owner = '{$kgarden}') u where u.id = au.tid and role = 0 and classnm='{$step}'";
        } else if ($sel == '3')
            //$sqlString = "SELECT *  FROM eplat_user where tid = '{$step}' and role = 0";
            if ($step == '전체')
                //$sqlString = "SELECT *  FROM eplat_user where  role = 0";
                $sqlString = "SELECT * , u.owner FROM eplat_user au, (select id uid, owner from eplat_user  ) u where u.uid = au.tid and role = 0";
            else
                $sqlString =  "SELECT *  FROM eplat_user au, (select id from eplat_user where owner = '{$step}' ) u where u.id = au.tid and role = 0";
    } else {
        if ($sel == '1') {
            if ($step == '전체')
                $sqlString = "SELECT *  FROM eplat_user where tid = '{$tid}' ";
            else
                $sqlString = "SELECT *  FROM eplat_user where tid = '{$tid}' and step = '{$step}'";
        } else if ($sel == '2')
            $sqlString = "SELECT *  FROM eplat_user where tid = '{$tid}' and classnm = '{$step}'";
        else if ($sel == '3')
            if ($step == '전체')
                $sqlString = "SELECT *  FROM eplat_user where tid = '{$tid}' ";
            else
                $sqlString = "SELECT *  FROM eplat_user where tid = '{$tid}' and owner = '{$step}'";
    }
    $rows = array();

    $i = 0;

    try {

        $rs = mysqli_query($conn, $sqlString);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'      => $row['id'],
                    'name'  => $row['name'],
                    'passwd'   => $row['password'],
                    'step'    => $row['step'],
                    // 'mobile'  => $row['mobile'],								
                    'rdate'   => $row['rdate'],
                    'classnm' => $row['classnm'],
                    'owner'   => $row['owner'],
                )
            );
        }
        $conn->close();
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    header('Content-Type: application/json');
    echo json_encode(array("json" => $rows));
}

function SShowStudyList($data)
{
    session_start();

    global $conn;
    $tid = $data['id'];
    $step = $data['step'];
    $start = $data['start'];
    $end = $data['end'];

    $tsql = "select u.id id, u.name name , s.volume v, s.step s, s.uid uid, count(u.id) cnt from study_record s, eplat_user u where ";
    if ($step == '전체')
        $sqlString = $tsql . "u.id = s.id and u.tid = '{$tid}'  and  s.rdate >= '{$start}' and s.rdate <= '{$end}'  group by id";
    else
        $sqlString = $tsql . " s.step = '{$step}' and u.id = s.id and u.tid = '{$tid}'  and  s.rdate >= '{$start}' and s.rdate <= '{$end}' group by id, s.step";

    $rows = array();

    $i = 0;

    try {

        $rs = mysqli_query($conn, $sqlString);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'    => $row['id'],
                    'name'  => $row['name'],
                    'cnt'   => $row['cnt'],
                )
            );
        }
        $conn->close();
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    header('Content-Type: application/json');
    echo json_encode(array("json" => $rows));
}

function SCheckStudentID($data)
{
    session_start();

    global $conn;
    $result = 0;
    $id = $data['id'];

    $sql = "select  id from  eplat_user where id like '{$id}%'";

    $rows = array();

    $i = 0;

    try {

        $rs = mysqli_query($conn, $sql);

        $conn->close();

        if (mysqli_num_rows($rs) > 0)
            $result = 1;
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    header('Content-Type: application/json');
    echo json_encode(array("result" => $result));
}

function SShowStudyList2($data)
{
    session_start();

    global $conn;
    $tid = $data['id'];
    $classnm = $data['classnm'];
    $start = $data['start'];
    $end = $data['end'];

    $tsql = "select u.id id, u.name name ,u.classnm classnm, s.volume v, s.step s, s.uid uid, count(u.id) cnt from study_record s, eplat_user u where ";
    if ($classnm == '전체' || $classnm == "")
        $sqlString = $tsql . "u.id = s.id and u.tid = '{$tid}' and  s.rdate >= '{$start}' and s.rdate <= '{$end}' group by id";
    else
        $sqlString = $tsql . " u.classnm = '{$classnm}' and u.id = s.id and u.tid = '{$tid}' and s.rdate >= '{$start}' and s.rdate <= '{$end}' group by id";

    $rows = array();

    $i = 0;

    try {

        $rs = mysqli_query($conn, $sqlString);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'id'    => $row['id'],
                    'name'  => $row['name'],
                    'cnt'   => $row['cnt'],
                )
            );
        }
        $conn->close();
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    header('Content-Type: application/json');
    echo json_encode(array("json" => $rows));
}

function SShowClassList($data)
{
    session_start();

    $tid = $data['id'];
    $kgarden = $data['kgarden'];

    global $conn;

    $sqlString = "select DISTINCT classnm from eplat_user where tid = '{$tid}'";

    if ($tid == "admin")
        //$sqlString = "select DISTINCT classnm from eplat_user where tid = '{$kgarden}' and classnm is not null";
        $sqlString = "SELECT DISTINCT classnm FROM eplat_user au, (select id from eplat_user where owner = '{$kgarden}') u where u.id = au.tid and role = 0";
    $rows = array();

    $i = 0;

    try {

        $rs = mysqli_query($conn, $sqlString);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'classnm'    => $row['classnm'],
                )
            );
        }
        $conn->close();
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    header('Content-Type: application/json');
    echo json_encode(array("success" => $rows));
}

function SShowKgardenList($data)
{
    session_start();

    $tid = $data['id'];

    global $conn;

    $sqlString = "select DISTINCT owner from eplat_user where mid = '{$tid}' and owner is not null and role=2";

    if ($tid == "admin")
        $sqlString = "select DISTINCT owner from eplat_user where owner is not null and role=2";
    $rows = array();

    $i = 0;

    try {

        $rs = mysqli_query($conn, $sqlString);

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'owner'    => $row['owner'],
                )
            );
        }
        $conn->close();
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    header('Content-Type: application/json');
    echo json_encode(array("success" => $rows));
}

function SinsertStudent($data)
{

    global $location;
    global $conn;

    session_start();

    // $json = file_get_contents('php://input');

    // $arr = json_decode($json, true);

    $id = "";
    $result = "";

    try {

        foreach ($data['items'] as $row) {

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
                $result =  array("error:" =>  $sql . "<br>" . $conn->error);
            }
        }

        $conn->close();
    } catch (Exception $e) {
        echo  json_encode(array("error:" => $e->getMessage()));
    }

    echo json_encode($result);
}

function SupdateStudent($data)
{

    global $location;
    global $conn;

    session_start();

    // $json = file_get_contents('php://input');
    // $arr = json_decode($json, true);

    $id = "";
    $result = "";

    try {
        foreach ($data['items'] as $row) {

            $id = $row['id'];
            $name = $row['name'];
            $password = $row['passwd'];
            $tid = $row['tid'];
            $classnm = $row['classnm'];
            $step = $row['step'];
            $role = 0;
            $confirm = 1;
            $sql = "update eplat_user set  
                    name     = '" . $row['name'] . "',
                    password = '" . $row['passwd'] . "',                     
                    classnm  = '" . $row['classnm'] . "',
                    step     = '" . $row['step'] . "'
                    WHERE id = '" . $row['id'] . "' and tid ='" . $row['tid'] . "'";
            if ($conn->query($sql) === TRUE) {
                $result =  "New record created successfully";
            } else {
                $result =  "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    echo json_encode($result);
}

function SUploadBoardPDF($data)
{
    session_start();

    $id = $data['id'];
    $porlist = $data['postlist'];
    $porid  = $data['porid'];
    $addr   = $data['addr'];
    $mobile = $data['mobile'];
    $order  = $data['order'];
    $zip = "";
    if (isset($data['zip']))   //
        $zip    = $data['zip'];
    $role = 1;

    global $conn;
    global $location;

    $rows = array();
    $pdfname = "";
    $user = "admin";
    $res = "";
    $res1 = "";

    $url = "http://localhost:3000/Server/uploads/";

    if ($location == "eplat")
        $url = "https://eplat.co.kr/Server/uploads/";

    foreach ($_FILES as $index => $file) {
        // for easy access
        $fileName     = $file['name'];
        // for easy access
        $fileTempName = $file['tmp_name'];
        // check if there is an error for particular entry in array
        if (!empty($file['error'][$index])) {
            return false;
        }
        // check whether file has temporary path and whether it indeed is an uploaded file
        if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
            // move the file from the temporary directory to somewhere of your choosing
            $RandomName = generateRandomString(15);
            $pdfname = $RandomName . $fileName;
            $res = move_uploaded_file($fileTempName, "uploads/" . $RandomName . $fileName);
            //move_uploaded_file($fileTempName, "uploads/" . $fileName);
            $tmp = $fileTempName;
        }
    }

    try {

        $sqlstring = "insert into eplat_porlist ( id, por_id, por_list, rdate, `order`, addr, mobile, pdfname, zip ) values ( '{$id}', '{$porid}',  '{$porlist}',  NOW() , '{$order}', '{$addr}', '{$mobile}', '{$pdfname}' , '{$zip}')";
        $res1 = mysqli_query($conn,  $sqlstring);

        if ($res === TRUE && $res1 == TRUE) {
            $result = ['url' => $url . $pdfname];
        } else {
            $result =  ['url' => 'http://localhost:3000/Server/uploads/cC6Gw7chIxgSkKlgenerated_pdf.pdf'];
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode(array("Error:" => $e->getMessage()));
    }

    // Set the response content type to JSON
    header('Content-Type: application/json');
    // Output the data as JSON
    echo json_encode($result);
}

function SUploadBoard($data)
{
    session_start();
    $content   = $data['idContent'];
    $desc   = $data['idDesc'];
    $cate   = $data['idSelect2'];
    $user =  'admin';

    global $conn;
    $rows = array();

    if (!empty($user)) {
        foreach ($_FILES as $index => $file) {
            // for easy access
            $fileName     = $file['name'];
            // for easy access
            $fileTempName = $file['tmp_name'];
            // check if there is an error for particular entry in array
            if (!empty($file['error'][$index])) {
                return false;
            }
            // check whether file has temporary path and whether it indeed is an uploaded file
            if (!empty($fileTempName) && is_uploaded_file($fileTempName)) {
                // move the file from the temporary directory to somewhere of your choosing
                $RandomName = generateRandomString(15);
                move_uploaded_file($fileTempName, "../board/uploads/" . $RandomName . $fileName);
                //move_uploaded_file($fileTempName, "uploads/" . $fileName);
                $tmp = $fileTempName;
            }
            array_push($rows, array(
                'name'     => $fileName,
                'fakename' => $RandomName . $fileName,
                'size'     => $file['size'],
            ));
        }
        $jsarr = json_encode($rows, JSON_UNESCAPED_UNICODE);
        try {

            $sqlstring = "insert into repository ( title, id, contents, `desc`, rdate, cate ) values ( '$content', '$user',  '$jsarr', '$desc',  NOW(), '$cate')";
            $res = mysqli_query($conn,  $sqlstring);

            if ($res === TRUE) {
                $result = true;
            } else {
                $result =  "Error: " . $sqlstring . "<br>" . $conn->error;
            }

            $conn->close();
        } catch (Exception $e) {
            echo json_encode(array("error:" => $e->getMessage()));
        }

        echo json_encode(array("result:" => $result));
    } else {
        Header("Location: login.php");
    }
}

function SShowBoardList($data)
{
    session_start();

    $num = $data['num'];
    $cate = $data['cate'];

    global $conn;

    try {
        if ($cate == "1") {
            if ($num == "전체")
                $sqlString = "SELECT num, title, id, contents, `desc`, rdate, cate  FROM repository order by num desc";
            else
                $sqlString = "SELECT num, title, id, contents, `desc`, rdate, cate  FROM repository where cate = '$num' order by num desc";
        } else
            $sqlString = "SELECT num, title, id, contents, `desc`, rdate, cate  FROM repository where num = $num order by num desc";

        $rs = mysqli_query($conn, $sqlString);
        $rows = array();

        $i = 0;

        while ($row = mysqli_fetch_array($rs)) {
            array_push(
                $rows,
                array(
                    'num'      => $row['num'],
                    'title'    => $row['title'],
                    'id'       => $row['id'],
                    'contents' => $row['contents'],
                    'desc'     => $row['desc'],
                    'rdate'    => $row['rdate'],
                    'cate'     => $row['cate'],
                )
            );
        }
    } catch (Exception $e) {
        return json_encode($e->getMessage());
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
    $res = "";
    $rows = array();
    $cont = "";

    try {
        $sql = "SELECT contents from repository WHERE num = " . $num . "";

        $rs = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($rs)) {
            $cont =  $row['contents'];
        }
        $jsobj = json_decode($cont, true);

        if ($jsobj !== null) {
            $arrlen = count($jsobj);
            for ($i = 0; $i < $arrlen; $i++) {
                if (unlink('../board/uploads/' . $jsobj[$i]['fakename'])) {
                    $res = true;
                } else {
                    $res = false;
                }
            }
        }

        $sql = "DELETE FROM repository WHERE num = '" . $num . "'";

        if ($conn->query($sql) === TRUE) {
            $res = true;
        } else {
            $res =  json_encode(array("Error deleting record: " . $conn->error));
        }

        $conn->close();
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }

    echo json_encode($res);
}

function generateRandomString($length = 15)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function resize_image($file, $w, $h, $crop = FALSE)
{

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