<?php
header("X-XSS-Protection: 0");
$name = $_GET['query'];
echo "Hello, " . $name;
?>