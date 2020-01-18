<?php
$t=0;
	$userid = $_REQUEST["q"];
	$page="cart";
	$title="Cart";
	require_once('header.php');
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
  $dbname="art_gallery";
  $con=mysqli_connect($servername,$username,$password,$dbname);
	$sql = "select Art from cart where id=".$userid;
	$res=mysqli_query($con,$sql);
?>

      <div class="container-fluid cart-container">
				<div class="panel panel-default">
				  <div class="panel-heading" style="text-align:center;"><h1>My Cart</h1></div>
				  <div class="panel-body">
					<table class="table cart_table" align="center" id="myTable">
						<thead>
					  <tr style="font-weight:bolder">
						<td></td>
						<td></td>
						<td>Product</td>
						<td>Price</td>
						<td>Quantity</td>
						<td>Total</td>
						</tr>
						</thead>
						<tbody>
						<?php
						if (mysqli_num_rows($res) > 0) {
							$i=0;
							while($row = mysqli_fetch_assoc($res)) {
								$name = $row['Art'];
								$sql1 = "select Price from art where name='$name'";
								$res1=mysqli_query($con,$sql1);
								$row1 = mysqli_fetch_assoc($res1);
								$price = $row1["Price"];
								echo '
					  <tr id="paint">
						<td>
							<button onclick="deleteRow(this,\''.$name.'\')" style="background-color:#8dbbec;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						</td>
						<td>
							<img src="images/'.$name.'.jpg" alt="Painting" class="my_cart_items"/>
						</td>
						<td>
							<p>'.$name.'</p>
						</td>
						<td>
							<p>Rs. <span id="price'.$i.'">'.$price.'</span></p>
						</td>
						<td>
							<div class="input-group q_item_group">
							  <div class="input-group-addon add" onclick="btnClick(1,'.$i.')"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></div>
								<center><lable id="q_item'.$i.'" value="1">1</lable></center>
							  <div class="input-group-addon remove" onclick="btnClick(0,'.$i.')"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></div>
							</div>
						</td>
						<td>
							<p>Rs. <span id="total_price'.$i.'">'.$price.'</span></p>
						</td>
						</tr>';

						$i++;
						$t = $t + $price;
							}
						}
						?>
					  <tr>
						<td colspan="4"></td>
						<td>Grand Total : Rs.<span id="gt"><?php echo $t; ?></span></td>
						<td><button onclick="bought()"><span style="position:relative;left:-20px;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>Confirm Purchase</button></td>
						</tr>
					</tbody>
					</table>

				  </div>
				</div>
      </div>

	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
	
		function btnClick(x,y){
			var a=document.getElementById("q_item"+y).innerHTML;
			var b=document.getElementById("price"+y).innerHTML;
			var c=document.getElementById("gt").innerHTML;
			if(x==1){
				document.getElementById("q_item"+y).innerHTML=parseInt(a)+1;
				document.getElementById("gt").innerHTML = parseInt(c) + parseInt(b);
			}
			else{
			if(parseInt(a)>1){
				document.getElementById("q_item"+y).innerHTML=parseInt(a)-1;
				document.getElementById("gt").innerHTML = parseInt(c) - parseInt(b);
			}
		}
		document.getElementById("total_price"+y).innerHTML = parseInt(document.getElementById("q_item"+y).innerHTML)*parseInt(b);
			
		}
	function deleteRow(r,n) {
		var id = <?php echo $userid; ?>;
		var i = r.parentNode.parentNode.rowIndex;
		document.getElementById("myTable").deleteRow(i);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var msg = this.responseText;
							
			}
		};
		xmlhttp.open("GET", "http://localhost/Art-Gallery/src/delcart.php?q="+n+"&p="+id, true);
		xmlhttp.send();
	}


	function bought(){
		var id = <?php echo $userid; ?>;
		var c=document.getElementById("gt").innerHTML;
		c = parseInt(c);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var msg = this.responseText;
			if(msg=="OK"){
				$("#myTable tbody #paint").remove();
			}
			}
		};
		xmlhttp.open("GET", "http://localhost/Art-Gallery/src/buy.php?q="+id+"&c="+c, true);
		xmlhttp.send();
	}
	</script>
	</body>
	</html>
