<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p> Demonstrating SQL Injection</p>
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
        $email = $_POST["email"];
        $password = $_POST["password"];
       
        $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password';"; //$email and $password in single quote is very important!!!
       //$sql = "SELECT * FROM user_info WHERE email = \"$email\" AND password = \"$password\";"; //$otherwise syntax error!!!

        echo "<br>" . "THE SQL QUERY ATTEMPTED IS: " . $sql;
        $result = mysqli_query($con,$sql);
        //echo "<br>" ."Number of rows = ". mysqli_num_rows($result) . "<br>";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               //echo "email: " . $row["email"]. "<br>";
               header("location:profile.php?email=".$email);
            }
         } else {
            echo "0 results";
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