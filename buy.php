<?php
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
    $dbname="art_gallery";
    $spent = $_REQUEST["c"];
    $id = $_REQUEST["q"];
    $con=mysqli_connect($servername,$username,$password,$dbname);
    $sql = "select Art from cart where Id = ".$id;
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            $name = $row['Art'];
            $sql1 = "update art set Sold = 'Yes', Bought_by = ".$id." where Name = '$name'";
            mysqli_query($con, $sql1);
    }}
    $sql3 = "delete from cart";
    $sql2 = "update user set Spent = ".$spent." where Id = ".$id;
    mysqli_query($con, $sql2);
    mysqli_query($con, $sql3);
    echo "OK";
?>