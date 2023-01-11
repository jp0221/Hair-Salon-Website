<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Book An Appointment Form</title>
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
	</style>
	
</head>
<body>

	<?php

		include("connect.php");
		ini_set("display_errors", 1);

		if (isset($_POST['submit'])){
			if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['id'])&& !empty($_POST['type']) && !empty($_POST['date'])){
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$id = $_POST['id'];
				$type = $_POST['type'];
				$date = $_POST['date'];
				$random = rand();
				$bookquery = "SELECT * FROM ClientRecords WHERE FirstName ='$fname' AND LastName = '$lname' AND ClientID = '$id' ";
				
				$run1 = mysqli_query($con,$bookquery) or die(mysqli_error($con));
				
				if (mysqli_num_rows($run1)> 0){
					$appointquery = "INSERT INTO ClientAppt(AppointmentType, DateTime, StylistID, ClientID, AppointmentID) VALUES('$type','$time', '$IDN','$id','$random')";
					$run2 = mysqli_query($con, $appointquery) or die(mysqli_error($con));
					if ($run2){
						echo '<script>alert("Successfully Submitted ");</script>';
					}
				
				
					else{
						echo '<script>alert("Not Successful");</script>';
						}	
				}
				else{
					echo '<script>alert("Client Does not exist");</script>';
				}
			}
			else{
				echo '<script>alert("All fields are required!");</script>';
				}
		}

	?>	
		<div class = "box">
		<h2 align = "center" >The Art of Hair: Make an Appointment Form
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
					  <label for="type">Appointment Type:</label>
					  <input type="text" id="type" name="type" placeholder = "Haircut">
					  <small>Required</Small>
					</div>
					
					<div class = "formElements">
					  <label for="date">Date and Time:</label>
					  <input type="text" id="date" name="date" placeholder = "November 3, 2021">
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