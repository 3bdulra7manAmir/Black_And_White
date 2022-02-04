<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../Site - CSS/Cart.css">
	<meta charset="utf-8">
	<title></title>
	<style>

.body
{
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    margin: 0 0 0;
}
	
.Products
{
    margin-left: auto; 
    margin-right: auto;
}

.button
{
    padding: 15px 32px;
    font-size: 16px;
    margin: 4px 2px;
    background-color: #4CAF50;
    float: right;
}

.div
{
	position: fixed;
    bottom: 0;
    padding-left: 85%;
}

#cartimg
{
	padding-left: 40%;
}

	</style>


</head>
<body class="body">

<?php include("Header.php");

$conn=mysqli_connect("localhost","root","","blackandwhite");
$query="SELECT * FROM billing WHERE Item_Quantity>=1";
$queryPrice="SELECT SUM(Total_Price) 'Sum' FROM billing WHERE Item_Quantity>=1";
$queryTotal="SELECT SUM(Item_no) 'Total' FROM billing WHERE Item_Quantity>=1" ; 
$result=mysqli_query($conn,$query);
$Price=mysqli_query($conn,$queryPrice);
$Total=mysqli_query($conn,$queryTotal);

?>
	
<div id="no">
   
<img id="cartimg" src="../Site - Images/flour_free_vector_icons_designed_by_iconixar_qIe_icon.ico">
		<?php if($Total){ ?>
	<h1>Your shopping cart(<span type=""><?php 
			while($row=mysqli_fetch_assoc($Total)){
		 echo $row['Total'];?></span>)</h1><?php  
		 if ($row['Total']<1) {
		 	?>
<p class="callout warning" data-closable>
        Shopping cart is currently empty<br /></p><?php }}} ?><p class="callout warning" data-closable>Add items to your cart and view them here before you checkout.     
           <a href ="Shop.php">Continue shopping!</a>    </p>
</div>
	<table class="Products">
		  <tr>
		    <th>Product</th>
		    <th>Details</th>
		  </tr>
		  <?php while ($row=mysqli_fetch_assoc($result)) {?>
		  <tr>
		    <td rowspan="3"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>"
		    	style="width: 150px"> <br> <h5><?= $row['Item_desc'] ?></h5> </td>
		    <td>Quantity : <?= $row['Item_Quantity']?></td>
		  </tr>
		  <tr>
		    <td>Size : <?= $row['Item_Size']?></td>
		  </tr>
		  <tr>
		    <td>Price : <?= $row['Item_Price']?></td>

		  </tr><br>
		  <tr><td colspan="2"><hr><br></td></tr>
		<?php } ?>
	</table>
<br><br>

	<div class="div">
		<?php
			while($row=mysqli_fetch_assoc($Price)){
		 ?>
<h2>Total Price : (<?=  $row['Sum'] ?><?php } ?>)</h2>
<form action="Checkout.php" method="post" >
	<input id="phone" type="hidden" name="Phone" value="">
<button class="button" onclick="myfun()" >Checkout</button>
</form>
</div>

<script type="text/javascript">
	function myfun(){
		var x=prompt("Enter your Phone Number");
		document.getElementById("phone").value=x;
	}
</script>

</body>
</html>