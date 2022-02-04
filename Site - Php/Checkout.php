<?php 
	$x=array();
	$y=array();
	$z=array();
	$c=array();
	$phone=$_POST['Phone'];
	$conn=mysqli_connect("localhost","root","","blackandwhite");
	$query1="SELECT Item_ID , Item_desc, Item_Size, Item_Quantity, Item_Price FROM billing WHERE Item_Quantity>=1";
	$query3="DELETE FROM billing";

	$result1=mysqli_query($conn,$query1);
	while ($row=mysqli_fetch_assoc($result1)) {
		array_push($x, $row['Item_ID']);
		array_push($y,$row['Item_Size']);
		array_push($z, $row['Item_Quantity']);
	}
	if (isset($y) && !empty($y)) {
		for ($i=0;$i<count($y);$i++){
		$query6="SELECT * FROM item_counter WHERE item_ID=".$x[$i]." AND Item_Size='".$y[$i]."'";
		$result6=mysqli_query($conn,$query6);
		if ($result6) {
			while ($row=mysqli_fetch_assoc($result6)) {
				array_push($c,($row['Item_Quantity']-$z[$i]));
			}
		}
	}
}

	
	for ($i=0;$i<count($y);$i++) {
		$query4="DELETE FROM item_counter WHERE item_ID=".$x[$i]." AND Item_Size='".$y[$i]."'";
		$result4=mysqli_query($conn,$query4);
		if ($result4){
			continue;
		}
		else
			mysqli_error($conn);
	}
	for ($i=0;$i<count($y);$i++) {
		$query5="INSERT INTO Item_counter VALUES (".$x[$i].", '".$y[$i]."', ".$c[$i].")";
		$result5=mysqli_query($conn,$query5);
		if ($result5){
			continue;
		}
		else
			mysqli_error($conn);
	}
	$result3=mysqli_query($conn,$query3);

	$tostring="";
	while($row=mysqli_fetch_assoc($result1)){
		$tostring.="Item ID=".$row['Item_ID']." Item Name=".$row['Item_desc']." Item Size=".$row['item_Size']." Item Quantity=".$row['Item_Quantity']." Item Price=".$row['Item_Price'];
	}
	$Msg="An Order Have been Ordered by".$phone."\nThe Order:".$tostring;
	echo $Msg;
	$query2="INSERT INTO orders VALUES ('','".$Msg."')";
	$result2=mysqli_query($conn,$query2);
	if ($result2) {
		if (mysqli_error($conn)) {
			echo mysqli_error($conn);
		}
		echo "<script>alert('Thanks for Ordering from us! <3')</script>";
		$result4;
		$result3;
		header("location: Home.php");
	}
	else {
		mysqli_error($conn);
	}
	
?>
