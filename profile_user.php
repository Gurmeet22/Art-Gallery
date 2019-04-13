<?php
	$page="profile";
	$title="Home";
	require_once('header.php');
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
    $dbname="art_gallery";
    $con=mysqli_connect($servername,$username,$password,$dbname);
    $sql = "select * from art,artist where artist.id=art.painter and art.Sold='NO'";
    $res=mysqli_query($con,$sql);

?>