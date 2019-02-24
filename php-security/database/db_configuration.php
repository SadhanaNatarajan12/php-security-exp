<?php
//error_reporting(0);
    define ('HOST' , 'localhost');
    define ('USER', 'root');
    define ('PASS', 'root');
    define ('DB', 'php-security');

    $con = mysqli_connect(HOST, USER, PASS, DB);
    if ($con->connect_error) {
        echo $con->connect_error;
    }
?>