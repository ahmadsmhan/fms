<?php
function create_new_user() {
	$xml = new DOMDocument("1.0", "UTF-8");
	$xml->load("passwords.xml");
	$today = date("F j, Y, g:i a");

	$rootTag = $xml->getElementsByTagName("document")->item(0);

	$dataTag = $xml->createElement("data");

	$username = $xml->createElement("email", $_REQUEST['email']);
	$password = $xml->createElement("password", $_REQUEST['password']);
	$country = $xml->createElement("country", $_REQUEST['country']);
	$age = $xml->createElement("age", $_REQUEST['age']);
	$date = $xml->createElement("date", $today);

	$dataTag->appendChild($username);
	$username->appendChild($password);
	$dataTag->appendChild($country);
	$dataTag->appendChild($age);
	$dataTag->appendChild($date);
	$rootTag->appendChild($dataTag);

if (!is_dir("C:/xampp/htdocs/fms/fileuser/".$_REQUEST['email'])) {
mkdir("C:/xampp/htdocs/fms/fileuser/".$_REQUEST['email']);
echo "Email has been created";
$xml->save("passwords.xml");
}else {
	echo "The Email has been taken by another Account";
}

}

function check_user($username, $password) {
	$passwords = simplexml_load_file("passwords.xml");
$passwordss = file_get_contents("passwords.xml");

	foreach ($passwords->data as $user) {
		echo $user;
	if (($username == $user->email) && ($password == $user->email->password)) {
			$_SESSION["user"] = $username;
		header("Location: ../../index.php");

	}


}
	echo "The Email or Password is incorrect";

}


function check_Url(){
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if($url == "http://localhost/fms/index.php?path=fileuser/"|| $url == "http://localhost/fms/index.php?path=fileuser") {
		header("location: index.php");
	}elseif ($url == "http://localhost/fms/?path=fileuser/"||$url == "http://localhost/fms/?path=fileuser") {
	  header("location: index.php");
	}elseif ($url == "http://localhost/fms/?path="||$url == "http://localhost/fms/index.php?path=") {
	  header("location: index.php");
	}

	if(strpos($_SERVER['REQUEST_URI'], '//') !== false)
	header("location: ../404.html");

	if(strpos($_SERVER['REQUEST_URI'], 'index.php/') !== false)

	header("location: ../404.html");

}

function GO_BACK(){
 if(strpos($_SERVER['REQUEST_URI'], 'fileuser') !== false){
   echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
}}
