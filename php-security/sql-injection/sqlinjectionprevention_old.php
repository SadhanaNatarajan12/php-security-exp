<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p> Demonstrating SQL Injection Prevention</p>
    <form method="post" action="">
        <p><label for "email"> Email Id: </label>
        <input type="text" name="email" size = 50 placeholder="Enter email"/></p>
        <p><label for "password"> Password: </label>
        <input type="password" name="password" size = 50 placeholder="Enter Password"/></p>
        <input type="submit" name="submit" value="Login">
</body>
</html>

<?php
    $con = mysqli_connect("localhost", "root", "root", "php-security");
    if ($con->connect_error) {
        echo $con->connect_error;
    }
    if (isset($_POST["submit"])) {
        if (!$pre_stmt = $con->prepare("SELECT * FROM user_info WHERE email = ? AND password = ?")) {
            die('died at prepare!');
        }
        if (!$pre_stmt->bind_param("ss",$_POST["email"], $_POST["password"])) {
            die('died at bind_param!');
        }
        if (!$pre_stmt->execute()) {
            die('died at execute!');
        }
        $result = $pre_stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            header("location:profile.php?email=".$_POST["email"]);
        } else {
            echo "<br/>" . "login failed!!!";
        }
    }
    /*  $testsql = "SELECT DATABASE() as dbname FROM DUAL;";
    $testresult = mysqli_query($con,$testsql);
    if (mysqli_num_rows($testresult) > 0) {
        while($row = mysqli_fetch_assoc($testresult)) {
            echo "Name: " . $row["dbname"]. "<br>";
        }
    }*/
?>


