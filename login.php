

<html>
<head>
<title> HOME </title>
<link type="text/css" rel="stylesheet" href="TAOH.css"/>
</head>

<body>
<?php

ini_set("display_errors", 1);
include("connect.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$IDN = $_POST['IDN'];
$tel = $_POST['tel'];
$pass = $_POST['pass'];
$transaction = $_POST['transaction'];

$query = "SELECT * FROM StylistsRecord WHERE FirstName = '$fname' AND LastName = '$lname' AND ID = '$IDN' AND Password = '$pass' ";
$sql = mysqli_query($con, $query);
if(!$sql){
	die('Error: '. mysqli_error($con));
}
if(mysqli_num_rows($sql) > 0){
	if(isset($transaction)&& $transaction == "Search a Stylist's Account"){
		session_start();
		$_SESSION['IDN'] = $IDN;
		header("location: search.php");
	}
	if(isset($transaction)&& $transaction == "Book a Client's Appointment"){
		session_start();
		$_SESSION['IDN'] = $IDN;
		header("location: makeAppt.php");
	}
	if(isset($transaction)&& $transaction == "Place a Client's Order"){
		session_start();		
		$_SESSION['IDN'] = $IDN;
		header("location: order.php");
	}
	if (isset($transaction) && $transaction == "Update a Client's Order"){
		session_start();
		$_SESSION['IDN'] = $IDN;
		header("location: update.php");
	}
	if (isset($transaction) && $transaction == "Cancel a Client's Appointment"){
		
		$_SESSION['IDN'] = $IDN;
		header("location: cancel.php");
	}
	if (isset($transaction) && $transaction == "Cancel a Client's Order"){
		$_SESSION['IDN'] = $IDN;
		header("location: cancelOrder.php");
	}
	if (isset($transaction) && $transaction == "Create a New Client Account"){
		$_SESSION['IDN'] = $IDN;
		header("location: create.php");
	}
		
	
	
	else{
		echo("error");
	}

}
else{
	echo '<script>alert("please enter correct information");</script>';
}



?>

 

	
 
</body>
</html>