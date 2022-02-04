<?php
$conn=mysqli_connect( "localhost", "root" , "" , "blackandwhite" );
$email=mysqli_escape_string($conn,$_GET['uname']);
$password=sha1($_GET['psw']);
$query="SELECT * FROM users WHERE `E-mail` = '".$email."' AND `Password` = '".$password."' LIMIT 1";
$result=mysqli_query($conn,$query);
if ($result) {
	while ($row=mysqli_fetch_assoc($result)) {
	$_SESSION['id']=$row['ID'];
	$_SESSION['email']=$row['E-mail'];
	header("location: Home.php");
	exit;
}
}
if (mysqli_error($conn)){
	mysqli_error($conn);
}
else{
	header("location: Home.php?err=true");
}
mysqli_free_result($result);
mysqli_close($conn);

?>