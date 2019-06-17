<?php
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
    $dbname="art_gallery";
    $name = $_REQUEST["q"];
    $id = $_REQUEST["p"];
    $con=mysqli_connect($servername,$username,$password,$dbname);
    $sql = "delete from liked where Art = '$name' and Id = ".$id;
    $sql1 = "update art set likes = likes - 1 where Name = '$name'";
    mysqli_query($con, $sql);
    mysqli_query($con, $sql1);
?>