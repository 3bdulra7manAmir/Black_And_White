<?php
$conn=mysqli_connect("localhost","root","","blackandwhite");
$ID=$_GET['ID'];
$query1="SELECT * FROM items WHERE Item_ID =".$ID;
$query2="SELECT * FROM item_counter WHERE Item_ID=".$ID;
$result=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);
?>
<?php while ($row=mysqli_fetch_assoc($result)){?>
<form method="post">
<label for="Item_ID">ID:</label><br>
<input type="text" name="ID" value="<?=$row['Item_ID']?>" readonly><br>
<label for="Item_desc">Item Name:</label><br>
<input type="text" name="Name" value="<?= $row['Item_desc'] ?>" ><br>
<label for="Item_Gender">Item Gender:</label><br>
<input type="radio" name="Gender" value="Men" <?= ($row['Item_Gender']=="Men")? "Checked" : "" ?>>
<label for="Item_Gender">Men</label><br>
<input type="radio" name="Gender" value="Women" <?= ($row['Item_Gender']=="Women")? "Checked":"" ?>>
<label for="Item_Gender">Women</label><br>
<label for="Item_Type">Item Type:</label><br>
<input type="radio" name="Type" value="Top" <?= ($row['Item_Type']=="Top")? "Checked":"" ?>>
<label for="Item_Type">Top</label><br>
<input type="radio" name="Type" value="Pants" <?= ($row['Item_Type']=="Pants")? "Checked":"" ?>>
<label for="Item_Type">Pants</label><br>
<input type="radio" name="Type" value="Accs" <?= ($row['Item_Type']=="Accs")? "Checked":"" ?>>
<label for="Item_Type">Accessories</label><br>
<input type="radio" name="Type" value="Sheos" <?= ($row['Item_Type']=="Sheos")? "Checked":"" ?>>
<label for="Item_Type">Sheos</label><br>
<input type="radio" name="Type" value="Boots" <?= ($row['Item_Type']=="Boots")? "Checked":"" ?>>
<label for="Item_Type">Boots</label><br>
<input type="radio" name="Type" value="Skirts" <?= ($row['Item_Type']=="Skirts")? "Checked":"" ?>>
<label for="Item_Type">Skirts</label><br>
<input type="radio" name="Type" value="Dresses" <?= ($row['Item_Type']=="Dresses")? "Checked":"" ?>>
<label for="Item_Type">Dresses</label><br>
<input type="radio" name="Type" value="Sandals" <?= ($row['Item_Type']=="Sandals")? "Checked":"" ?>>
<label for="Item_Type">Sandals</label><br>
<input type="radio" name="Type" value="Bags" <?= ($row['Item_Type']=="Bags")? "Checked":"" ?>>
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
<input type="text" name="Quantity6" value=""><br>
<label for="<?= $row['Item_Price']?>">Item Price:</label><br>
<input type="text" name="Price" value="<?= $row['Item_Price']?>" ><br>

<?php } ?>
<input type="Submit" value="Edit">
</form>

<?php
if (isset($_POST['Name']) && !empty($_POST['Name'])) {
$ID=$_POST['ID'];
$Name=$_POST['Name'];
$Gender=$_POST['Gender'];
$Type=$_POST['Type'];
if (isset($_POST['Size1']) && !empty($_POST['Size1'])) {
	$Size1=$_POST['Size1'];
	$Quantity1=$_POST['Quantity1'];
}
if (isset($_POST['Size2']) && !empty($_POST['Size2'])) {
	$Size2=$_POST['Size2'];
	$Quantity2=$_POST['Quantity2'];
}
if (isset($_POST['Size3']) && !empty($_POST['Size3'])) {
	$Size3=$_POST['Size3'];
	$Quantity3=$_POST['Quantity3'];
}
if (isset($_POST['Size4']) && !empty($_POST['Size4'])) {
	$Size4=$_POST['Size4'];
	$Quantity4=$_POST['Quantity4'];
}
if (isset($_POST['Size5']) && !empty($_POST['Size5'])) {
	$Size5=$_POST['Size5'];
	$Quantity5=$_POST['Quantity5'];
}
if (isset($_POST['Size6']) && !empty($_POST['Size6'])) {
	$Size6=$_POST['Size6'];
	$Quantity6=$_POST['Quantity6'];
}
$Price=$_POST['Price'];
$queryinput1="UPDATE items SET Item_desc='".$Name."', Item_Gender='".$Gender."', Item_Type='".$Type."', Item_Price=".$Price." WHERE Item_ID=".$ID;
$query3="DELETE FROM item_counter WHERE item_ID=".$ID;
$input1=mysqli_query($conn,$queryinput1);
$result3=mysqli_query($conn,$query3);
if (isset($Size1)){
	$querysize1="INSERT INTO item_counter VALUES (".$ID.",'".$Size1."',".$Quantity1.")";
	$resultsize1=mysqli_query($conn,$querysize1);
}

if (isset($Size2)){
	$querysize2="INSERT INTO item_counter VALUES (".$ID.",'".$Size2."',".$Quantity2.")";
	$resultsize2=mysqli_query($conn,$querysize2);
}

if (isset($Size3)){
	$querysize3="INSERT INTO item_counter VALUES (".$ID.",'".$Size3."',".$Quantity3.")";
	$resultsize3=mysqli_query($conn,$querysize3);
}

if (isset($Size4)){
	$querysize4="INSERT INTO item_counter VALUES (".$ID.",'".$Size4."',".$Quantity4.")";
	$resultsize4=mysqli_query($conn,$querysize4);
}

if (isset($Size5)){
	$querysize5="INSERT INTO item_counter VALUES (".$ID.",'".$Size5."',".$Quantity5.")";
	$resultsize5=mysqli_query($conn,$querysize5);
}

if (isset($Size6)){
	$querysize6="INSERT INTO item_counter VALUES (".$ID.",'".$Size6."',".$Quantity6.")";
	$resultsize6=mysqli_query($conn,$querysize6);
}

$input1;
$result3;
if (mysqli_error($conn)){ echo mysqli_error($conn);}

if(isset($resultsize1)){
	$resultsize1;
};
if(isset($resultsize2)){
	$resultsize2;
};
if(isset($resultsize3)){
	$resultsize3;
};
if(isset($resultsize4)){
	$resultsize4;
};
if(isset($resultsize5)){
	$resultsize5;
};
if(isset($resultsize6)){
	$resultsize6;
}
header("location: Admins_Items.php");
}
?>