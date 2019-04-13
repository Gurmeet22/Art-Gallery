<?php
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
    $dbname="art_gallery";
    $name = $_REQUEST["q"];
    $id = $_REQUEST["p"];
    $con=mysqli_connect($servername,$username,$password,$dbname);
    $sql = "delete from cart where Art = '$name' and Id = ".$id;
    mysqli_query($con, $sql);
?>