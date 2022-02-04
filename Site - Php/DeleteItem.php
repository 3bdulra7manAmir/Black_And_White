<?php
	$conn=mysqli_connect("localhost","root","","blackandwhite");
	$ID=$_GET['ID'];
	$query="DELETE FROM items WHERE Item_ID =".$ID;
	$result=mysqli_query($conn,$query);
	if ($result){
		?><script type="text/javascript">alert("Item have been deleted Successfuly")</script>
		<?php header("location:Admins_Items.php");
	}
	else {
		echo mysqli_error($conn);
	}
?>