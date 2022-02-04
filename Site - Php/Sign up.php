<?php
$error=array();
$conn=mysqli_connect("localhost", "root","","blackandwhite");
if(!isset($_POST['uname']) && empty($_POST['uname'])){
$error[]="name";
}
if(isset($_POST['E-mail']) && !filter_input(INPUT_POST, 'E-mail', FILTER_VALIDATE_EMAIL)){
$error[]="email";
}
if(!isset($_POST['psw']) && strlen($_POST['psw']>7)){
$error[]="psw";
}
if(!isset($_POST['psw1']) && !($_POST['psw']===$_POST['psw1'])){
$error[]="psw1";
}
if ($error) {
	header("location: Header.php?error=".implode(",", $error));
	exit;
}
$name=mysqli_escape_string($conn,trim($_POST['uname']));
$email=mysqli_escape_string($conn,$_POST['E-mail']);
$password=mysqli_escape_string($conn,sha1($_POST['psw']));
$query="INSERT INTO `users` (`UserName`, `E-mail`, `Password`) VALUES ('".$name."', '".$email."', '".$password."')";
if (mysqli_query($conn,$query)) {?>
	<script>alert("Thanks for Registration");</script>
<?php
header("location: Home.php");
mysqli_close($conn);
exit;
}
else{
	echo $query;
	echo mysqli_error($conn);
}
?>