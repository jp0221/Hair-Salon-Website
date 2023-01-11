<?php
$servername = "sql1.njit.edu";
$username = "jp47";
$password = "Pjimit-2167";
$dbname = "jp47";
$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_error())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
 {
echo "CONNECTED ";
}		
?>