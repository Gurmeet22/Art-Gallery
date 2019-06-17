<?php
$id = $_REQUEST["q"];
if(isset($_POST["edit"])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$ph = $_POST["ph"];
	$user = $_POST["username"];
	$birth = $_POST["birth"];
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
	$sql = "update artist set pname = '$name',Email = '$email',Phone = '$ph',Username = '$user',Birthplace = '$birth' where Id = ".$id;
    $conn->query($sql);
    header("Location: http://localhost/Art/artist_details.php");
}
?>
