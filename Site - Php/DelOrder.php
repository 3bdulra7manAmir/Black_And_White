<?php
$conn=mysqli_connect("localhost","root","","blackandwhite");

if (isset($_POST['ID'])) {
	$ID=$_POST['ID'];
	$query="DELETE FROM orders WHERE order_no=".$ID;
	$result=mysqli_query($conn,$query);
	if ($result){
		header("location:Orders.php");
	}
	else{
		mysqli_error($conn);
	}
}

?>