<?php
include_once "../database/db_configuration.php";

if (isset($_POST["submit"])) {
    setcookie("password", "mypassword", strtotime("+1 day"));
    //echo $_COOKIE["password"]

    $name = htmlspecialchars($_POST["name"]);           //To prevent stored xss!
    $comments = htmlspecialchars($_POST["comments"]);   //To prevent stored xss!

    //$name = htmlentities($_POST["name"]);           //To prevent stored xss!
    //$comments = htmlentities($_POST["comments"]);   //To prevent stored xss!

    if (!$pre_statement = $con->prepare("INSERT INTO xss_demo (name,comments) VALUES (?,?)")) {
        die('died at prepare!');
    } 
    if (!$pre_statement->bind_param("ss",$name, $comments)) {     //To prevent stored xss!
        echo "died at bind_param!";
    }
    if (!$pre_statement->execute()) {
        die('died at execute!');
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Demonstrating XSS</title>
  </head>
  <body>
    <div class="container">
    <h3>Preventing Cross-site-scripting!</h3>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="" autocomplete="off">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea class="form-control" name="comments" id="comments" placeholder="Enter your comments here"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <p></p>
        <?php
            if (!$pre_statement = $con->prepare("select * from xss_demo")) {
                die('died at prepare!');
            } 
            if (!$pre_statement->execute()) {
                die('died at execute!');
            }
            
            $result = $pre_statement->get_result();
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='row'>
                         <div class='col-md-6'>
                             <h4>" .$row["name"] . "</h4>
                             <p>" .$row["comments"] . "</p>
                        </div>
                        </div>";
                }
            }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
