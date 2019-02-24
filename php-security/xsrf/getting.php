<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['posted'] = true;
        $_SESSION['data'] = $_POST['data'];
    }

//header("location: index.php");
//or
die("Form posted successfully!");
?>