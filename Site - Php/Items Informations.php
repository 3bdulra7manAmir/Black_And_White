<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Item Info</title>

	<link rel="stylesheet" type="text/css" href="../Site - CSS/Items Informations.css">
	<link rel="icon" type="icon/icon" href="../Site - Images/WebSite.icon">

</head>
<body id="B">

<?php 
$ID=$_GET['ID'];
include("Header.php"); 
$conn=mysqli_connect("localhost","root","","blackandwhite");
$query="SELECT * FROM `Items` WHERE `Item_ID`='".$ID."'";
$query2="SELECT * FROM `item_counter` WHERE `Item_ID`='".$ID."'" ;
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query2);
$tostring="";
?>
<!-- First Item -->

<div class="CardParent">
   <?php while($row = mysqli_fetch_assoc($result)){?>
<div class="card">
<img
src     =   "data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>"
class   =   "image"
alt     =   "T-shirt"
width   =   "250"
height  =   "250">

<h2 id="HQT-Shirt"><?= $row['Item_desc']; ?></h2>

<div id="Price-Div">
<span id="price1"><?= $row['Item_Price']; ?></span> <span id="price5">LE</span>
<?php } ?>
</div>
<hr>
<form action="billing.php" name="sizeform" method="get">
	<input type="hidden" id="ID" name="ID" value="<?= $ID ?>">
 <?php while($row = mysqli_fetch_assoc($result2)){
 	
 $tostring.="
 <input  class   ='size'     type   ='radio'  id='size' name='Size' value=" . $row['Item_Size'] . ">
<label  class   ='csize'     for    ='size'>". $row['Item_Size']."</label>
";
 }
echo $tostring;
 ?>

<hr>





<span class="quantity">Quantity</span>
<br>
<input class="number" type="number" min="1" max="5" name="Quantity" placeholder="0">
<hr>
<input type="submit" class  ="addtocard buy" value="Add To Cart">
 </form>
</div>
</body>
</html>