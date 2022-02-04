<?php
$conn=mysqli_connect("localhost","root","","blackandwhite");
$query="SELECT * FROM users";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../Site - CSS/User.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body id="Body">
	
<table id="Table">
	<tr>
		<th>ID</th>
		<th>User Name</th>
		<th>E-Mail</th>
		<th>Gender</th>
		<th>Admin</th>
	</tr>
	<?php while ($row=mysqli_fetch_assoc($result)) {
	?>
	<tr>
		<td class="center"><?= $row['ID']?></td>
		<td class="center"><?= $row['UserName']?></td>
		<td class="center"><?= $row['E-mail']?></td>
		<td class="center"><?= $row['Gender']?></td>
		<td class="center"><?= ($row['Admin']==1)? "Yes" : "No"?></td>
		<td class="center">
			<form method="post" action="">
			 <?= ($row['Admin']!=1)? "
			<button type='submit'  name='Admin' value='".$row['ID']."'>Admin</button>"
			:
			"<button type='submit' name='user' value='".$row['ID']."'>User</button>"?>
		</form>
		</td>
	</tr>
<?php } ?>
</table>

<?php
	if (isset($_POST['user']) && !empty($_POST['user'])) {
		$ID=$_POST['user'];
		$query="UPDATE users SET Admin = 0 WHERE ID=".$ID;
		$result=mysqli_query($conn,$query);
		if ($result) {
		header("location:Admin_user.php");
		}
		else
			echo mysqli_error($conn);
	}
	if (isset($_POST['Admin']) && !empty($_POST['Admin'])) {
		$ID=$_POST['Admin'];
		$query="UPDATE users SET Admin = 1 WHERE ID=".$ID;
		$result=mysqli_query($conn,$query);
		if ($result) {
		header("location:Admin_user.php");
		}
		else
			echo mysqli_error($conn);
	}
?>
</body>
</html>