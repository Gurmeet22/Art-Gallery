<?php
	$userid = $_REQUEST["q"];
	$page="profile";
	$title="Profile";
	require_once('header.php');
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
	$dbname="art_gallery";
	$con=mysqli_connect($servername,$username,$password,$dbname);

?>
