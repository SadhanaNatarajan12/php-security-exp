<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Hacker's console</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity=
    "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=
    "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body style="marigin-top": 100px>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="panel">
                    <div class="panel-heading">
                        <h1>Hacker's Console</h1>
                    </div>
                    <p style="font-style: italic;">
                        We are anonymous!
                    </p>
                    <hr>
                    <form action="http://localhost:8888/php-security/xsrf/getting.php" method="post">
                    <!--
                     <form action="http://localhost:8888/php-security/xsrf/gettingxsrfprevent.php" method="post">
                     -->
                        <input type="text" name="data" class="form-control" style="border-radius: 0px">
                        <br>
                        <input type="submit" value="Submit Form" class="btn btn-outline-danger btn-sm">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>