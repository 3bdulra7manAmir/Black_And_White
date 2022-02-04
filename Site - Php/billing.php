<?php
	$conn=mysqli_connect("localhost","root","","blackandwhite");
	$ID=$_GET['ID'];
	$Size=$_GET['Size'];
	$Quantity=$_GET['Quantity'];
	$query="INSERT INTO billing (`Item_ID`,`Item_Size`,`Item_Quantity`) VALUES ('".$ID."' , '".$Size."' , '".$Quantity."')";
	$result=mysqli_query($conn,$query);
	if($result){
		$query="UPDATE billing SET Item_desc = (SELECT Item_desc FROM items WHERE Item_ID = ". $ID ." ) , Item_IMG = ( SELECT Item_IMG FROM items WHERE Item_ID=".$ID.") , Item_Price = (SELECT Item_Price FROM items WHERE Item_ID=".$ID.") WHERE Item_ID= ".$ID;
		if (mysqli_query($conn,$query)) {
			$query="UPDATE billing SET Total_Price=(SELECT (Item_Quantity*Item_Price) WHERE Item_ID=".$ID.") WHERE Item_ID =".$ID;
			if (mysqli_query($conn,$query)) {
			mysqli_close($conn);
			header("location: Cart.php");
			}
			else
			echo mysqli_error($conn);
		
		}
		else
			echo mysqli_error($conn);

	}
	else 
		echo mysqli_error($conn);
		mysqli_close($conn);

?>