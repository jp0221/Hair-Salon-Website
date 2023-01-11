<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Update Order Form</title>
	<link rel="stylesheet" href="TAOH.css">
	<style>
		body { 
			background-image: url('background.jpg');
			background-repeat: no-repeat;
			background-size: 100%;
			background-attachment: fixed;
		
		}
		.topnav {
			overflow: hidden;
			background-color: #333;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 40px;
			z-index: 999;
			}

		.topnav a {
		  float: left;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		.topnav a.active {
			background-color: #04AA6D;
			color: white;
		}
	</style>
	
</head>
<body>

	<?php
			include("connect.php");
			ini_set("display_errors", 1);

			
				
			if (isset($_POST['submit'])){
				if (!empty($_POST['id'])&&  !empty($_POST['orderNum']) && !empty($_POST['product'])){
				
					$id = $_POST['id'];
					$orderNum = $_POST['orderNum'];
					$product = $_POST['product'];
					
					$orderExists = "SELECT * FROM ClientOrder WHERE ClientID = '$id' AND OrderNumber = '$orderNum' ";
					$check = mysqli_query($con, $orderExists);
					if(!$check){
						die('Error: '. mysqli_error($con));
					}
					
					if(mysqli_num_rows($check) > 0){
						$product = $_POST['product'];
						$updateQuery = "UPDATE ClientOrder SET ProductTypeQuantity = CONCAT(ProductTypeQuantity,', $product') WHERE OrderNumber = '$orderNum' ";
						$run4 = mysqli_query($con, $updateQuery) or die(mysqli_error($con));
						if($run4){
							
							echo '<script>alert("Successfully Order Updated ");</script>';
						}
						else{
							echo '<script>alert("Unsuccesful");</script>';
							}
					
					}
					else{
						
						echo '<script>alert("Client not found");</script>';
					}
				}
				else{
					echo '<script>alert("All fields are required");</script>';
					}
			}		
			
			
			
			
			

	?>	
		<div class = "box">
		<h2 align = "center" >The Art of Hair: Update Order Form
			<p>
				<form name = "myForm" id="myForm" method="post" <?php echo $_SERVER['PHP_SELF'];?>>
					
					<div class = "formElements">
					  <label for="id">Client's ID #:</label>
					  <input type="text" id="id" name="id" placeholder = "0">
					  <small>Required</Small>
					</div>
					 
					<div class = "formElements">
					  <label for="orderNum">Client's Order Number:</label>
					  <input type="text" id="orderNum" name="orderNum" placeholder = "0">
					  <small>Required</Small>
					</div>
					
					<div class = "formElements">
					  <label for="product">Update Order:</label>
					  <input type="text" id="product" name="product" placeholder = "Shampoo">
					  <small>Required</Small>
					</div>
					
					<br><div class="input-group full">
					  <input type="submit" id = "submit" name = "submit" value="SUBMIT" />
					</div>
					
					 </div>
				</form> 
			</p>
		</h2>
	</div>
	
	<div class="topnav">
		<a class="active" href="TAOH.html">Home</a>
		<a href="search.php">Search Stylist's Records</a>
		<a href="makeAppt.php">Make Appointment</a>
		<a href="order.php">Place Order</a>
		<a href="update.php">Update Order</a>
		<a href="cancel.php">Cancel Appointment</a>
		<a href="cancelOrder.php">Cancel Order</a>
		<a href="create.php">Create An Account</a>
	</div>
	
	</body>
</html>