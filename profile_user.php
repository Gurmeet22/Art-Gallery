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
	$sql = "select * from user where Id = ".$userid;
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($res);
?>
<div class="container-fluid cart-container">
	<div class="panel panel-default">
		<div class="panel-heading" style="text-align:center;"><h1>Hi, <?php echo $row["Name"]; ?></h1></div>
			<div class="row panel-body">
				<div class="col-md-4">
					<div class="container">
						<h1 style="position:relative;left:100px;">Profile Info</h1><br>
						<img src="images/pic.png" alt="profile">
						<span><button type="button" class="btn btn-default" style="font-size:120%;padding:10px;">Upload Profile Photo</button></span>
					</div>
					<div class="container" style="font-size:150%;position:relative;left:30px;">
						Name : <?php echo $row["Name"]; ?><br>
						Email : <?php echo $row["Email"]; ?><br>
						Phone : <?php echo $row["Phone"]; ?><br>
						Username : <?php echo $row["Username"]; ?><br>
						Total Spent : Rs. <?php echo $row["Spent"]; ?><br>
					</div>
				</div>
				<div class="col-md-4"  style="border-right: 2px solid #fff;border-left: 2px solid #fff;">
					<div class="container">
						<h1 style="position:relative;left:100px;">Liked Paintings</h1><br>
						<?php

						$sql2 = "select Art from liked where Id = ".$userid;
						$res2 = mysqli_query($con, $sql2);
						if (mysqli_num_rows($res2) > 0) {
							while($row = mysqli_fetch_assoc($res2)) {
								echo '<div class="container" style="position:relative;left:100px;">
								<img src="images/'.$row["Art"].'.jpg" class="img-thumbnail home_img" width="500px" alt="Painting">
								<span><h1 style="width:200px;text-align:center;">'.$row["Art"].'</h1></span><br>
								<span style="position:relative;left:60px;"><button onclick="unlike(\''.$row["Art"].'\')" type="button" class="btn btn-default unlike" style="font-size:120%;padding:10px;">Unlike</button></span>
								</div>
								<br><br>';
							}
						}

						?>
					</div>
				</div>
				<div class="col-md-4">
				<div class="container">
						<h1 style="position:relative;left:100px;">Bought Paintings</h1><br>
						<?php

						$sql3 = "select Name, Price from art where Bought_by = ".$userid;
						$res3 = mysqli_query($con, $sql3);
						if (mysqli_num_rows($res3) > 0) {
							while($row = mysqli_fetch_assoc($res3)) {
								echo '<div class="container" style="position:relative;left:100px;">
								<img src="images/'.$row["Name"].'.jpg" class="img-thumbnail home_img" width="500px" alt="Painting">
								<span><h1 style="width:200px;text-align:center;">'.$row["Name"].'</h1></span>
								<span style="position:relative;left:60px;"><h3> Rs. '.$row["Price"].'</h3></span><br>
								</div>
								<br><br>';
							}
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function unlike(x){
	var id = <?php echo $userid; ?>;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var msg = this.responseText;
		location.reload();
		}
	};
	xmlhttp.open("GET", "http://localhost/Art/dellike.php?q="+x+"&p="+id, true);
	xmlhttp.send();
}
</script>