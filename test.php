<?php
/*https://security.stackexchange.com/questions/65142/what-is-reflected-xss*/
/**
 * @Author Vaibs
 *
 */
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
if (isset($_REQUEST['Submit'])) { //check if form was submitted
    $input = isset($_REQUEST['appid']) ? $_REQUEST['appid'] : "";//get input text
    echo "Input from client is reflected back as ->  : " . $input;
}
?>

<html>
<body>
<form>
    <input type="text" name="appid"/>
    <input type="submit" name="Submit"/>
</form>
</body>
</html>