<?php
$conn=mysqli_connect("localhost","root","","blackandwhite");
?>
<form method="post" enctype="multipart/form-data" action="">
<label for="Item_desc">Item Name:</label><br>
<input type="text" name="Name" value="" ><br>
<label for="Item_Gender">Item Gender:</label><br>
<input type="radio" name="Gender" value="Men" >
<label for="Item_Gender">Men</label><br>
<input type="radio" name="Gender" value="Women" >
<label for="Item_Gender">Women</label><br>
<label for="Item_Type">Item Type:</label><br>


<input type="radio" name="Type" value="Top" >
<label for="Item_Type">Top</label><br>
<input type="radio" name="Type" value="Pants" >
<label for="Item_Type">Pants</label><br>
<input type="radio" name="Type" value="Accs" >
<label for="Item_Type">Accessories</label><br>
<input type="radio" name="Type" value="Shoes" >
<label for="Item_Type">Shoes</label><br>
<input type="radio" name="Type" value="Boots" >
<label for="Item_Type">Boots</label><br>
<input type="radio" name="Type" value="Skirts" >
<label for="Item_Type">Skirts</label><br>
<input type="radio" name="Type" value="Dresses" >
<label for="Item_Type">Dresses</label><br>
<input type="radio" name="Type" value="Sandals" >
<label for="Item_Type">Sandals</label><br>
<input type="radio" name="Type" value="Bags" >
<label for="Item_Type">Bags</label><br>
<h3>Sizes and thier Quantities</h3>

<label for="Item_Size">XS</label>
<input type="Checkbox" name="Size1" value="XS"><br>
<label for="Item_Quantity">Item_Quantity</label>
<input type="text" name="Quantity1" value=""><br>

<label for="Item_Size">S</label>
<input type="Checkbox" name="Size2" value="S"><br>
<label for="Item_Quantity">Item_Quantity</label>
<input type="text" name="Quantity2" value=""><br>

<label for="Item_Size">M</label>
<input type="Checkbox" name="Size3" value="M"><br>
<label for="Item_Quantity">Item_Quantity</label>
<input type="text" name="Quantity3" value=""><br>

<label for="Item_Size">L</label>
<input type="Checkbox" name="Size4" value="L"><br>
<label for="Item_Quantity">Item_Quantity</label>
<input type="text" name="Quantity4" value=""><br>

<label for="Item_Size">XL</label>
<input type="Checkbox" name="Size5" value="XL"><br>
<label for="Item_Quantity">Item_Quantity</label>
<input type="text" name="Quantity5" value=""><br>

<label for="Item_Size">XXL</label>
<input type="Checkbox" name="Size6" value="XXL"><br>
<label for="Item_Quantity">Item_Quantity</label>
<input type="text" name="Quantity6" value=""><br><br>
<label for="Item Price">Item Price:</label>
<input type="text" name="Price" value="" ><br>
<input type="file" name="img" value=""><br>
<input type="Submit" name="submit" value="Add">
</form>

<?php
if (isset($_POST) && !empty($_POST)) {
$Name=$_POST['Name'];
$Gender=$_POST['Gender'];
$Type=$_POST['Type'];
$Size=array();
$Quantity=array();
if (isset($_POST['Size1']) && !empty($_POST['Size1'])) {
	array_push($Size, $_POST['Size1']);
	array_push($Quantity, $_POST['Quantity1']);
}
if (isset($_POST['Size2']) && !empty($_POST['Size2'])) {
	array_push($Size, $_POST['Size2']);
	array_push($Quantity, $_POST['Quantity2']);
}
if (isset($_POST['Size3']) && !empty($_POST['Size3'])) {
	array_push($Size, $_POST['Size3']);
	array_push($Quantity, $_POST['Quantity3']);
}
if (isset($_POST['Size4']) && !empty($_POST['Size4'])) {
	array_push($Size, $_POST['Size4']);
	array_push($Quantity, $_POST['Quantity4']);
}
if (isset($_POST['Size5']) && !empty($_POST['Size5'])) {
	array_push($Size, $_POST['Size5']);
	array_push($Quantity, $_POST['Quantity5']);
}
if (isset($_POST['Size6']) && !empty($_POST['Size6'])) {
	array_push($Size, $_POST['Size6']);
	array_push($Quantity, $_POST['Quantity6']);
}
$Price=$_POST['Price'];
$msg = "";
 
  
if (!empty($_FILES["img"]["name"])) {
	$filename= basename($_FILES["img"]["name"]);
	$FileType= pathinfo($filename, PATHINFO_EXTENSION);
	$allowTypes=array('jpg','png','jpeg');
	if (in_array($FileType, $allowTypes)) {
		$image=$_FILES['img']['tmp_name'];
		$imgcontent= addslashes(file_get_contents($image));
	}
}


$queryinput1="INSERT INTO items VALUES('','".$Name."','".$Gender."','".$Type."',".$Price.",'".$imgcontent."')";
$input1=mysqli_query($conn,$queryinput1);
if ($input1) {
	echo "<script>alert('Successfully Added!')</script>";
	
}


if (mysqli_error($conn)) {
	echo mysqli_error($conn);
}
if (!mysqli_error($conn)) {


header("location: AddItem.php?Size=".implode(",",$Size)."&Quantity=".implode(",",$Quantity));
}
}

if (isset($_GET['Size']) && !empty($_GET['Size'])){
	$Size=explode(",", $_GET['Size']);
	$Quantity=explode(",", $_GET['Quantity']);
	$query="SELECT Max(Item_ID) 'Item_ID' FROM items";
	$result=mysqli_query($conn,$query);
	if ($result) {
	
	while ($row=mysqli_fetch_assoc($result)) {
		$ID=$row['Item_ID'];
	}
	for ($i=0;$i<count($Size);$i++){
		$query2="INSERT INTO item_counter VALUES (".$ID.",'".$Size[$i]."',".$Quantity[$i].")";
		$result2=mysqli_query($conn,$query2);
		if ($result2) {;}
		else{
			mysqli_error($conn);
		}
	}
	header("location: Admins_items.php");
}
	else
		mysqli_error($conn);

	
}

?>