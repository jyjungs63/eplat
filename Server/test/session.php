<?php
// 세션을 시작합니다.
session_start();

// 세션 변수 설정
$_SESSION['username'] = 'john_doe';
$_SESSION['user_id'] = 12345;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Session Example</title>
</head>

<body>
    <h1>Session Example</h1>
    <!-- 페이지 내용 -->
    <p> <?php echo $_SESSION['username'] ?></p>
</body>

</html>