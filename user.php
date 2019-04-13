<?php
	$page="index";
	$title="Home";
	require_once('header.php');
	$host="localhost";
$dbusername="root";
$dbpassword="";
  $dbname="art_gallery";
  $con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
  $sql = "select * from art,artist where artist.id=art.painter and art.Sold='NO'";
$res=mysqli_query($con,$sql);

?>
		<div class="container-fluid" style="width:100%;padding:0;">
		  <div class="row slider" style="width:100%;padding:0;">
			<div class="col-lg-12" style="width:100%;padding:0;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%;padding:0;">
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
			
				  </ol>
				  <div class="carousel-inner" role="listbox">
					
					<div class="item active">
					  <img src="images/2.jpg" alt="Chania" style="height:500px;width:100%">
					</div>
					<div class="item">
					  <img src="images/3.jpg" alt="Flower" style="height:500px;width:100%">
					</div>
					<div class="item">
					  <img src="images/1.jpg" alt="Flower" style="height:500px;width:100%">
					</div>
					<div class="item">
					  <img src="images/4.jpg" alt="Flower" style="height:500px;width:100%">
					</div>
				  </div>

				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		  </div>

		  <div class="row home_info">
			<div class="col-md-12 recent_product">
                <div class="panel panel-default">
				    <div class="panel-heading" style="text-align:center;background-color: #8dbbec;"><h1 style="color:black;">Available Paintings</h1></div>
				        <div class="panel-body">
								<div class="container recent_product_container">
															<?php
															$i=0;

															if (mysqli_num_rows($res) > 0) {
																    while($row = mysqli_fetch_assoc($res)) {

																				echo '
																				<ul style="list-style-type:none;">
																				<li>
																				<div class="row">
																				<div class="col-md-4">
																				<img src="images/'.$row["Name"].'.jpg" class="img-thumbnail home_img" width="500px" alt="Cinque Terre">
																				</div>
																				<div class="col-md-4">
																				<span class="img-info" style="font-size:110%;position:relative;top:30px">
																				Painter : '.$row["pname"].'<br>
																				Birthplace : '.$row["Birthplace"].'<br>
																				Phone Number : '.$row["Phone"].'<br>
																				Email : '.$row["Email"].'<br>
																				Price : Rs.'.$row["Price"].'<br>
																				Likes : '.$row["Likes"].'<br>
																				Type : '.$row["Type"].'<br>
																				</span></div>
																				<div class="col-md-4">
																				<div class="row recent_img_desc" style="position:relative;top:30px">
				                                <div class="col-md-4"><button type="button" class="btn-add-cart">Add to Cart</button></div>
																				<div class="col-md-4"><button type="button" class="btn-add-cart">Like</button></div></div>
																				</div>
																				</div></li>

																				<li><div class="row recent_img_desc">
					                              <div class="col-md-4">'.$row["Name"].'</div></div></li>
																				</ul>
																				<hr>';

														}
													}
                        
														?>
                            </div>
                        </div>
                </div>
			</div>

		  </div>
			<script src="js/jquery.js"></script>
			<script src="js/script.js"></script>
			<script src="js/bootstrap.min.js"></script>
			</body>
			</html>
