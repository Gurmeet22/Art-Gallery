<?php
	$page="cart";
	$title="Cart";
	require_once('header.php');

?>

      <div class="container-fluid cart-container">
				<div class="panel panel-default">
				  <div class="panel-heading">Cart</div>
				  <div class="panel-body">
					<table class="table cart_table" align="center">
					  <tr style="font-weight:bolder">
						<td></td>
						<td></td>
						<td>Product</td>
						<td>Price</td>
						<td>Quantity</td>
						<td>Total</td>
					  </tr>
					  <tr>
						<td>
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</td>
						<td>
							<img src="images/Taj%20Mahal.jpeg" alt="Taj Mahal" class="my_cart_items"/>
						</td>
						<td>
							<p>Taj Mahal</p>
						</td>
						<td>
							<p>Rs. 250</p>
						</td>
						<td>
							<div class="input-group q_item_group">
							  <div class="input-group-addon add" onclick="btnClick('+')">+</div>
								<center><lable id="q_item" value="1">1</lable></center>
							  <div class="input-group-addon remove" onclick="btnClick('-')">-</div>
							</div>
						</td>
						<td>
							<p>Rs. <span id="total_price">250</span></p>
						</td>
					  </tr>
					  <tr>
						<td colspan="4"></td>
						<td><button>Update Cart</button></td>
						<td><button>Proceed to Checkout</button></td>
					  </tr>
					</table>

				  </div>
				</div>
      </div>




	<script type="text/javascript">

		function btnClick(x)
		{
			if(x=='+')
			{
				var a=document.getElementById("q_item").innerHTML;
				document.getElementById("q_item").innerHTML=parseInt(a)+1;
			}
			else
			{
				document.getElementById("q_item").innerHTML-=1;
			}
		}
	</script>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
	</html>
