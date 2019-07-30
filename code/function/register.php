<title>Register Now </title>
<link rel="icon" href="../icon/Register.png">
<?php
include("functions.php");
$page = "LOGIN";
/*
if (isset($_SESSION["user"])) {
	header("Location: lesson/ane.php");
} elseif (isset($_GET['user'])) {
	if($_GET['user'] == 'register') {
		$page = "REGISTER";
	}
}
*/
if (isset($_POST['ok'])) {
	create_new_user();
}
?>
<html>
	<head>
		<title>
			File Managment System
		</title>
	</head>
	<body>
		<h1>Register Now</h1>
		<form  action="" method="post">
			<table>
			<tr>
				<td align="right" valign="top">Email</td>
				<td><input name="email" type="email" required></td>
			</tr>
			<tr>
				<td align="right">Password</td>
				<td><input name="password" type="password" required></td>
			</tr>
			<tr>
				<td align="right">Country</td>
				<td><input name="country" type="text" required></td>
			</tr>
			<tr>
					<td align="right">Age</td>
					<td><input name="age" type="number" required></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="submit" name="ok"></td>
			</tr>
		</table>
		</form>
		<a href="log.php">Login with existing account</a>
 </body>
</html>
