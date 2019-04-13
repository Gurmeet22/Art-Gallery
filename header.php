<!DOCTYPE html>

<?php

	require_once('Admin/conn.php');
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
  $dbname="art_gallery";
	$con=mysqli_connect($servername,$username,$password,$dbname);
	$sql = "select pname from artist";
	$res=mysqli_query($con,$sql);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Gallery | <?php echo $title; ?></title>
    <link href="images/icon.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"/>

  </head>
  <body>




     <nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header" style="position:relative;left:600px;top:20px;">
			  <a class="navbar-brand" href="#">Art Gallery</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="position:relative;left:-300px;top:80px;">
			  <ul class="nav navbar-nav navbar-left top_menu">

				<li <?php if($page=="index") echo 'class="active"' ?> ><a href="http://localhost/Art/user.php?q=<?php echo $userid; ?>&t=all&a=all">Home</a></li>

				<li class="dropdown">
				  <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arts <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li style="text-align:center;">Category <span class="caret"></span></li>
					<li role="separator" class="divider"></li>
					<li><a href="http://localhost/Art/user.php?q=<?php echo $userid; ?>&t=Nature&a=all">Nature Paintings</a></li>
					<li><a  href="http://localhost/Art/user.php?q=<?php echo $userid; ?>&t=19th&a=all">19th Century Paintings</a></li>
					<li><a  href="http://localhost/Art/user.php?q=<?php echo $userid; ?>&t=Animal&a=all">Animal Paintings</a></li>
					<li><a  href="http://localhost/Art/user.php?q=<?php echo $userid; ?>&t=Landscape&a=all">Landscape Paintings</a></li>
					<li role="separator" class="divider"></li>

					<li style="text-align:center;">Artists <span class="caret"></span></li>
					<li role="separator" class="divider"></li>
					<?php
					if (mysqli_num_rows($res) > 0) {
						while($row = mysqli_fetch_assoc($res)) {
							$name = $row["pname"];
							echo '
					<li><a href="http://localhost/Art/user.php?q='.$userid.'&t=all&a='.$name.'">'.$name.'</a></li>';
						}
					}
					mysqli_close($con);
					?>
					</ul>					
				</li>

				<li <?php if($page=="cart") echo 'class="active"' ?>><a href="http://localhost/Art/cart.php?q=<?php echo $userid; ?>">Cart</a></li>
				<li <?php if($page=="profile") echo 'class="active"' ?>><a href="http://localhost/Art/profile_user.php?q=<?php echo $userid; ?>">Profile</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
