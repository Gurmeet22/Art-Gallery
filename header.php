<!DOCTYPE html>

<?php

	require_once('Admin/conn.php');
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

				<li <?php if($page=="index") echo 'class="active"' ?>><a style="background-color: #FFF;color:#FFA500" href="user.php">Home <span class="sr-only">(current)</span></a></li>

				<li class="dropdown <?php if($page=="arts") echo "active" ?>">
				  <a style="background-color: #FFF;color:#FFA500" href="arts.php" class="dropdown-toggle <?php if($page=="arts") echo "active" ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arts <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a style="background-color: #FFF;color:#FFA500" href="arts.php">Oil Paintings</a></li>
					<li><a style="background-color: #FFF;color:#FFA500" href="arts.php">Water Paintings</a></li>
					<li><a style="background-color: #FFF;color:#FFA500" href="arts.php">Artices Special</a></li>
					<li role="separator" class="divider"></li>
					<li><a style="background-color: #FFF;color:#FFA500" href="arts.php">Gallery</a></li>
				  </ul>
				</li>

				<li <?php if($page=="cart") echo 'class="active"' ?>><a style="background-color: #FFF;color:#FFA500" href="cart.php">Cart</a></li>
				<li <?php if($page=="profile") echo 'class="active"' ?>><a style="background-color: #FFF;color:#FFA500" href="profile.php">Profile</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
