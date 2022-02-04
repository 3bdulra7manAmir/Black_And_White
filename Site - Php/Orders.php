<?php
$conn=mysqli_connect("localhost","root","","blackandwhite");
$query="SELECT * FROM orders";
$result=mysqli_query($conn,$query);
if ($result){
?>
<table>
<tr>
	<th>Order Number</th>
	<th>Order</th>
</tr>

<?php
while ($row=mysqli_fetch_assoc($result)) {?>
	<tr>
		<td><?= $row['Order_no']?></td>
		<td><?= $row['Orders']?></td>
		<td>
	<form method="post" action="DelOrder.php">
	<input type="hidden" name="ID" value="<?= $row['Order_no']?>">
	<input type="submit" value="Delete Item">
		</form>
		</td>
	</tr>

<?php }
?>

</table>
<?php } 

else
{
	echo "<script>alert('There is no Orders')</script>";
}

?>