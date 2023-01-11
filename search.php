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
	<style type = "text/css">
	table {
		
		font-family: monospace;
		text-align: center;
		
		
		margin-left: auto;
		margin-right: auto;
		}
	th,tr{
		color:grey;
		border-style: solid;
		text-align: center;
	}

	
</style>
	
</head> 
<body>
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
 
 
 <br><br>
 <table>
	<th> Stylist First Name </th>
	<th> Stylist Last Name </th>
	<th> Stylist ID  </th>
	<th> Stylist Phone Number </th>
	<th> Stylist Email </th>
	<th> Client First Name </th>
	<th> Client Last Name </th>
	<th> Client ID  </th>
	<th> Appointment Type </th>
	<th> Date and Time </th>
	<th> Appointment ID </th>
	<th> Product </th>
	<th> Shipping Address  </th>
	<th> Order Number </th>
	
 
 </table>
 
 <?php
	
    
	include('connect.php');
	ini_set("display_errors",1);
	
	
	$sql = "SELECT s.FirstName, s.LastName, s.IDN, s.PhoneNumber, s.EmailAddress, c.FirstName, c.LastName, c.ClientID, a.AppointmentType, a.DateTime, a.AppointmentID, o.ProductTypeQuantity, o.ShippingAddress, o.OrderNumber FROM ClientOrder o JOIN StylistsRecord s ON o.StylistID = s.IDN JOIN ClientRecords c ON o.ClientID = c.ClientID JOIN ClientAppt a ON o.AppointmentID = a.AppointmentID WHERE s.IDN = '".$IDN."'";
	$result = mysqli_query($con, $sql) or die (mysqli_error($con));
		
	echo '<table>';
	while ($row = mysqli_fetch_array($result){
		echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["PhoneNumber"]."</td><td>". $row["EmailAddress"] . "</td><td>" . $row["FirstName"] . "</td> <td>" . $row["LastName"] . "</td><td>" . $row["ClientID"] . "</td><td>" . $row["AppointmentType"] . "</td> <td>" . $row["DateTime"] . "</td> <td>" . $row["AppointmentID"] . "</td><td>" . $row["ProductTypeQuantity"] . "</td><td>" . $row["ShippingAddress"] . "</td><td>" . $row["OrderNumber"] . "</td></tr>";
			
	}
	echo '</table>';
   
?>


</body>
</html> 



