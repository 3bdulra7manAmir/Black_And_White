<?php
$conn=mysqli_connect("localhost","root","","blackandwhite");
$query="";
$result="";
if (isset($_SESSION['id'])) {
  $query="SELECT * FROM users WHERE ID=".$_SESSION['id'];
  $result=mysqli_query($conn,$query);
}
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Site - CSS/Header.css">
  <title></title>

</head>
<body>

<header id="Header">

<!-- div 1 -->

<a href="Home.php">
<div id="D1"> Black And White </div>
</a>


<ul>
<nav class="NAV1">
  <?php if (!empty($result)) {
while ($row= mysqli_fetch_assoc($result)) {
 if ($row['Admin']==1) {
  
?>
<li><div class="Session"><a href="Admins_items.php" >&nbspManage Items&nbsp </a></div></li>
<li><div class="Session"><a href="Admin_User.php"  >&nbspManage Users&nbsp</a></div></li>
<li><div class="Session"><a href="Orders.php" >&nbspOrders&nbsp</a></div></li>
<?php
}
}
}
?>


<!-- div 2 -->

<div id="D2">



<li>
<a href="Home.php" target="" class="pad">Home</a>
</li>

<li id="dropdown">
<a href="Shop.php" id="dropbtn" class="pad">Shop <strong>&or;</strong> </a>

<div id="dropdown-content">
<a href="Men's.php">Men</a>
<a href="Women's.php">Women</a>
</div>
</li>

<li>
<a href="About Us.php" target="" class="pad"> About Us </a>
</li>

<li><a href="Contact Us.php" target="" class="pad"> Contact Us </a>
</li>



<li> <div id="Cart-IMG">&nbsp
<a href="Cart.php"><img id="drop1" src="../Site - Images/Cart.jpg"></a>
    </div>
</li>
<?php if (isset($_SESSION['id'])) {
?>
<li>
  <a href="logout.php">&nbspLog Out&nbsp</a>
</li>
<?php } ?>
<?php if (!isset($_SESSION['id'])) {
 ?>
<li class="dropdown2">

&nbsp

<img class="drop" class="" src="../Site - Images/Creat_Account.png" title="Login Account to your cart">

<strong>&or;</strong>&nbsp&nbsp&nbsp


<div class="dropdown-content2">
<button onclick="document.getElementById('id01').style.display='block'" style="width:100px;">sign up
</button>

<br>

<button onclick="document.getElementById('id02').style.display='block'" style="width:100px;">log in
</button>
  </div>
</li>
<?php } ?>
<div id="id02" class="modal">
  <?php
  if (isset($_GET['err']))
{
    ?>

<script>alert("Invalid Email or Password")</script>
    <?php
}
   ?>

<form class="modal-content animate" action="login.php" method="get">
<div >

<br>
<br>

<label for="E-mail">&nbsp<b>E-mail</b></label>
<input type="E-mail" placeholder="Enter E-mail" name="uname" required>

<label for="psw">&nbsp<b>Password</b></label>
<input type="password" placeholder="Enter Password" name="psw" required>
        
<button type="submit">Login</button>
<label>
<input type="checkbox" checked="checked" name="remember"> Remember me
</label>
</div>

<div style="background-color:#f1f1f1">
<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
</div>
</form>
</div>

    <div id="id01" class="modal">
  <?php
  $error_arr=array();
  if (isset($_GET['error'])) {
    $error_arr=explode(",", $_GET['error']);
      }
   ?>
  <form class="modal-content"  action="Sign up.php" method="post">
    <div>
      <br>
      <br>
      <label for="uname">&nbsp<b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required><?php if (in_array("name", $error_arr)) {
        echo "</br>* Please enter your name<br></br>";
      } ?>
      <label for="E-mail">&nbsp<b>E-mail</b></label>
      <input type="E-mail" name="E-mail" placeholder="Enter E-mail" required><?php if (in_array("email", $error_arr)) {
        echo "</br>* Please enter a valid email</br></br>";
      } ?>
      <label for="psw">&nbsp<b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required><?php if (in_array("psw", $error_arr)) {
        echo "</br>* Please enter a password greater than 7 Characters</br></br>";
      } ?>
      <label for="psw">&nbsp<b>Re-Enter Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw1" required><?php if (in_array("psw1", $error_arr)) {
        echo "</br>* Password doesn't match</br></br>";
      } ?>      
      <button type="submit" >sign up</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <?php 
      if (in_array("name", $error_arr)) {
        ?>
        <script>alert("Please enter your name");</script>
      <?php }
      if (in_array("email", $error_arr)) {
        ?>
        <script>alert("Please enter a valid email");</script>
      <?php }
        if (in_array("psw", $error_arr)) {
          ?>
       <script> alert("Please enter a password greater than 7 Characters");</script>
      <?php }
       if (in_array("psw1", $error_arr)) {
        ?>
      <script>  alert("Password doesn't match");</script>
      <?php }
      ?>
    <div style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
    </form>
    </div>
</div>
</span>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <!--code dashboard-->


 <!-- /form last code dashboard--></li>
    </nav></ul>

    </div>




</header>
</body>
</html>