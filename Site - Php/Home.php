<?php
$conn=mysqli_connect("localhost","root","","blackandwhite");
$query="";
$result="";
$x="";
if (isset($_SESSION['id'])) {
  $query="SELECT * FROM users WHERE ID=".$_SESSION['id'];
  $result=mysqli_query($conn,$query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="icon/icon" href="../Site - Images/WebSite.icon">
<link rel="stylesheet" type="text/css" href="../Site - CSS/Home.css">

			<title>Black And White</title>
</head>

<body id="B">
	<?php if (!empty($result)) {
while ($row= mysqli_fetch_assoc($result)) {
  $x="<span id='Welcome' ><span class='SP3'>Welcome</span> To Our Site Mr "."<span class='SP3'>".$row['UserName']."</span>"."</span>";
}
}
?>

<?php include("Header.php"); 

?>


<div class="D3">
<?php
	echo $x;
?><br>
<span class="SP3"> Loot </span>
<span> Whatever </span>
<span class="SP3"> You </span>
<span> Want, </span>
<span class="SP3."> Everything </span>
<span> is </span>
<span class="SP3"> Here!! <span class="SP3.">

</div>

<div class="D3" id="Padding-id">
	<img src="../Site - Images/BAW.png" id="Logo">
</div>

<?php include ("Footer.php"); ?>

</body>
</html>