<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Site - CSS/Admin's items.css">
	<title></title>
</head>

<?php include("Header.php"); ?>

<?php
    $conn=mysqli_connect( "localhost" , "root" , "" , "blackandwhite");


    $query="SELECT * FROM items";
    $result=mysqli_query($conn,$query);

?>
<body id="Body">
<h2 style="text-align: center; color: white;">Items</h2>
<table id="Table">
  <tr>
    <th>Item_ID</th>
    <th>Item_Name</th>
    <th>Item_Gender</th>
    <th>Item_Type</th>
    <th>Item_Size</th>
    <th>Item_Quantity</th>
    <th>Item_Price</th>
    <th>Item_IMG</th>

  </tr>
  <?php 
    while($row=mysqli_fetch_assoc($result)){
  ?>
  <tr>
    <td><?= $row['Item_ID'] ?></td>
    <td><?= $row['Item_desc'] ?></td>
    <td><?= $row['Item_Gender'] ?></td>
    <td><?= $row['Item_Type'] ?></td>
    <?php
    $query2="SELECT * FROM item_counter WHERE Item_ID = ".$row['Item_ID'];
    $result2=mysqli_query($conn,$query2);
    $tostring1="";
    $tostring2="";
    while($row1 = mysqli_fetch_assoc($result2)){
        $tostring1.=$row1['Item_Size']." ";
        $tostring2.=$row1['Item_Quantity']." ";
    }
    ?>
    <td><?= $tostring1 ?></td>
    <td><?= $tostring2 ?></td>
    <td><?= $row['Item_Price']?></td>
    <td>
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="50px" width="50px">
    </td>

<td><a href="EditItem.php?ID=<?=$row['Item_ID']?>">Edit</a></td>
<td><a href="DeleteItem.php?ID=<?= $row['Item_ID']?>">Delete</a></td>
    
  </tr>
<?php } ?>
</table>

<br>

<form id="Buttom-Div" action="AddItem.php" method="post">

<input type="submit" value="Add Item">

</form>

</body>
</html>