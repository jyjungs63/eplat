<!-- <?php
    phpinfo();
?> -->

<?php
$data = array('한글' => '안녕하세요');

// JSON_UNESCAPED_UNICODE 플래그를 사용하여 한글을 유니코드로 유지
//$json = json_encode($data, JSON_UNESCAPED_UNICODE);
$json = json_encode($data);

echo $json;
?>