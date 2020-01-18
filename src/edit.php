<?php
$id = $_REQUEST["q"];
if(isset($_POST["edit"])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$ph = $_POST["ph"];
	$user = $_POST["username"];
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
	$dbname = "art_gallery";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "update user set Name = '$name',Email = '$email',Phone = '$ph',Username = '$user' where Id = ".$id;
    $conn->query($sql);
    header("Location: http://localhost/Art-Gallery/src/profile_user.php?q=".$id);
}
?>