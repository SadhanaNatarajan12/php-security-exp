<?php
//verify the session token in the session and the token passed through the form.
    session_start();
/*
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['posted'] = true;
        $_SESSION['data'] = $_POST['data'];
    }
*/
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['token'])){
            if (hash_equals($_SESSION['token'], $_POST['token'])) {
                unset($_SESSION['token']);
                $_SESSION['posted'] = true;
                $_SESSION['data'] = $_POST['data'];
                die('Post successfully submitted!');
            } else {
                unset($_SESSION['token']);
                die('Invalid CSRF token');
            }
        } else {
            die('CSRF token not found');
        }
    }

//header("location: index.php");
//or
die("Form posted successfully!");
?>