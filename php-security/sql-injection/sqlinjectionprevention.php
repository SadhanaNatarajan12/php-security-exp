<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Preventing SQL Injection</title>
  </head>
  <body>
    <div class="container">
    <h3>Preventing SQL Injection!</h3>
        <div class="row">
            <div class="col-md-6">
            <form method="post" action="">    
                <div class="form-group">
                        <p><label for "email"> Email Id: </label>
                        <input type="text" name="email" class="form-control" id="exampleInputName" aria-describedby="nameHelp" size = 50 placeholder="Enter email">
                        <p><label for "password"> Password: </label>
                        <input type="password" name="password" class="form-control" id="exampleInputName" aria-describedby="passwordHelp" size = 50 placeholder="Enter Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>  
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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


