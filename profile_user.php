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
	$sql = "select"
?>
<div class="container-fluid cart-container">
	<div class="panel panel-default">
		<div class="panel-heading" style="text-align:center;"><h1>Cart</h1></div>
			<div class="panel-body" style="background-color:#f5f5f5;">
			</div>
		</div>
	</div>
</div>