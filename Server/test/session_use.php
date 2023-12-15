<?php
// 세션을 시작합니다.
session_start();

// 세션 변수 읽기
if (isset($_SESSION['username'])) {
    echo '사용자 이름: ' . $_SESSION['username'];
}

if (isset($_SESSION['user_id'])) {
    echo '사용자 ID: ' . $_SESSION['user_id'];
}
?>