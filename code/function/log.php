
<title>Login Now 🔑</title>
<link rel="icon" href="../icon/Login.png">

<?php
session_start();
if(isset($_SESSION["user"])) {
	header("Location:  ../../index.php");
}
if (isset($_POST['login'])) {
	$error = false;
	$mydata = simplexml_load_file("passwords.xml");
	$username = $_POST['username'];
	$password = $_POST['password'];
	include("functions.php");
	$error = check_user($username, $password);
	echo $error;


}



?>
<form method="post" action="">
  <td  align="left" valign="top"><h1>Login now</h1></td>
        <p>Username <input type="text" name="username" size="20" required/></p>
        <p>Password <input type="password" name="password" size="20" required /></p>
        <p><input type="submit" value="Login" name="login" /></p>
</form>
