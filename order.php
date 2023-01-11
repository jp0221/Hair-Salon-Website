<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Order Form</title>
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
	if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['id'])&& !empty($_POST['apptid']) && !empty($_POST['product']) && !empty($_POST['address'])){
		$firstC = $_POST['fname'];
		$lastC = $_POST['lname'];
		$CID = $_POST['id'];
		$AppointID = $_POST['apptid'];
		
		
		$clientCheck = "SELECT * FROM ClientRecords WHERE FirstName = '$firstC' AND LastName = '$lastC' AND ClientID = '$CID' ";
		
		$run1 = mysqli_query($con,$clientCheck) or die(mysqli_error($con));
		
		if(mysqli_num_rows($run1) > 0) {
			$appointCheck = "SELECT AppointmentID FROM ClientAppt WHERE AppointmentID ='$AppointID' ";
			$run2 = mysqli_query($con, $appointCheck) or die(mysqli_error($con));
			if(mysqli_num_rows($run2)>0) {
			
				$order = $_POST['order'];
				$ship = $_POST['ship'];
				$orderN = rand();
				$queryadd = "INSERT INTO OrderDetails(ProductTypeQuantity, Shipping Address,OrderNumber, StylistID,ClientID,AppointmentID) VALUES('$order', '$ship', '$orderN','$IDN','$CID','$AppointID') ";	
				$run3 = mysqli_query($con, $queryadd) or die(mysqli_error($con));
				if($run3){
					echo '<script>alert("Successfully Order Placed ");</script>';
				}
				else{
					echo '<script>alert("Unsuccesful");</script>';
					}
			}
			else{
				echo '<script>alert("Please make an appointment");</script>';
				header("location:makeAppt.php");
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
		<h2 align = "center" >The Art of Hair: Order Form
			<p>
				<form name = "myForm" id="myForm" method="post" <?php echo $_SERVER['PHP_SELF'];?>>
					
					<div class = "formElements">
					  <label for="fname">Client's First name:</label>
					  <input type="text" id="fname" name="fname" placeholder = "Example John" >
					  <small>Required</Small>
					</div>
					
					<div class = "formElements">
					  <label for="lname">Client's Last name:</label>
					  <input type="text" id="lname" name="lname" placeholder = "Example Doe">
					  <small>Required</Small>
					</div>
					
					<div class = "formElements">
					  <label for="id">Client's ID #:</label>
					  <input type="text" id="id" name="id" placeholder = "0">
					  <small>Required</Small>
					</div>
					 
					<div class = "formElements">
					  <label for="apptid">Client's Appointment ID:</label>
					  <input type="text" id="apptid" name="apptid" placeholder = "0">
					  <small>Required</Small>
					</div>
					
					<div class = "formElements">
					  <label for="product">Product Order:</label>
					  <input type="text" id="product" name="product" placeholder = "Shampoo">
					  <small>Required</Small>
					</div>
					
					<div class = "formElements">
					  <label for="address">Shipping Address:</label>
					  <input type="text" id="address" name="address" placeholder = "123 Parker Way">
					  <small>Required</Small>
					</div>
					
					<br><div class="input-group full">
					  <input type="submit" name = "submit" id = "submit" value="SUBMIT" />
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