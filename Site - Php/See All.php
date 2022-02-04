<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>

.internal{
 width: 16%;
 height: 100%;
 border: 1px solid black;
 display: inline-block;
}

.h{
	color: rgb(72, 61, 139);
}

.p{
	color: rgb(255, 69, 0);
	font-size: 20px;
}

	</style>

</head>
<body>
<?php 
include("Header.php");
$Gender = $_GET['Gender'];
$type=$_GET['Type'];
$conn=mysqli_connect("localhost","root","","blackandwhite");
$query="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = '".$Gender."' AND items.Item_Type= '".$type."' GROUP BY Item_ID Having Item_quantity>=1";
$result=mysqli_query($conn,$query);
echo mysqli_error($conn);
?>
<div class="center" id="content">
   <?php while($row = mysqli_fetch_assoc($result)){?>
   <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal>
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="200px" width="100%">
      <h2 class="h"><?= $row['Item_desc'] ?></h2>
      <p class="p"><?= $row['Item_Price'] ?> LE</p>
   </div></a>
<?php } ?>



</div>




</body>
</html>