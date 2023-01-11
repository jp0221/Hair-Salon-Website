<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Cancel Appointment</title>
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
				if (!empty($_POST['id']) && !empty($_POST['apptid'])){
		
					$id = $_POST['id'];
					$apptid = $_POST['apptid'];
					
					$checkAppoint = "SELECT * FROM ClientAppt WHERE ClientID = '$id' AND AppointmentID = '$apptid' ";
					
					$run5 = mysqli_query($con, $checkAppoint) or die(mysqli_error($con));
					if (mysqli_num_rows($run5) > 0){
						
					
						$deletequery = "DELETE FROM ClientAppt WHERE ClientID = '$id' AND AppointmentID = '$apptid' ";
						$run6 = mysqli_query($con,$deletequery) or die(mysqli_error($con));
						
						if($run6){
							echo '<script>alert("Successfully Canceled ");</script>';
						}
						else{
							echo '<script>alert("Not Successful");</script>';
							}	
					}
					else{
						echo '<script>alert("No Appointment or Client ID Found");</script>';
					}
				}
				else{
					echo '<script>alert("All fields are required!");</script>';
					}

			}
	?>	
		<div class = "box">
		<h2 align = "center" >The Art of Hair: Cancel Appointment
			<p>
				<form name = "myForm" id="myForm" method="post" <?php echo $_SERVER['PHP_SELF'];?>>
					
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