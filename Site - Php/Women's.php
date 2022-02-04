<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Site - CSS/Women's.css">
	<title>Women`s</title>
</head>
<body>
    <?php 
   $conn=mysqli_connect("localhost","root","","blackandwhite");
   $querytop="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Top' GROUP BY Item_ID Having Item_quantity>=1";
   $querypants="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Pants' GROUP BY Item_ID Having Item_quantity>=1";
   $queryskirt="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Skirts' GROUP BY Item_ID Having Item_quantity>=1";
   $queryDress="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Dresses' GROUP BY Item_ID Having Item_quantity>=1";
   $querySandals="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Sandals' GROUP BY Item_ID Having Item_quantity>=1";
   $querybags="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Bags' GROUP BY Item_ID Having Item_quantity>=1";
   $queryacc="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Accs' GROUP BY Item_ID Having Item_quantity>=1";
   $queryshoes="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Shoes' GROUP BY Item_ID Having Item_quantity>=1";
   $queryboots="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Women' AND items.Item_Type='Boots' GROUP BY Item_ID Having Item_quantity>=1";
   $Top=mysqli_query($conn,$querytop);
   $Pants=mysqli_query($conn,$querypants);
   $Acc=mysqli_query($conn,$queryacc);
   $Shoes=mysqli_query($conn,$queryshoes);
   $Boots=mysqli_query($conn,$queryboots);
   $skirt=mysqli_query($conn,$queryskirt);
   $Dress=mysqli_query($conn,$queryDress);
   $Sandals=mysqli_query($conn,$querySandals);
   $Bags=mysqli_query($conn,$querybags);
   include("Header.php");
   ?>
<h3 class="name">Top</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button1">   <   </button>
</div>
<div class="center" id="content1">
   <?php while($row = mysqli_fetch_assoc($Top)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div><?= $row['Item_desc'] ?></div>
      <div><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button1">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Top" class="link">See All..></a>	
</aside>
<h3 class="name">Pants</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button2">   <   </button>
</div>
<div class="center" id="content2">

       <?php while($row = mysqli_fetch_assoc($Pants)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button2">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Pants" class="link">See All..></a>	
</aside>
<h3 class="name">Skirts</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button3">   <   </button>
</div>
<div class="center" id="content3">

         <?php while($row = mysqli_fetch_assoc($skirt)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button3">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Skirts" class="link">See All..></a>	
</aside>
<h3 class="name">Dresses</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button4">   <   </button>
</div>
<div class="center" id="content4">

        <?php while($row = mysqli_fetch_assoc($Dress)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button4">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Dresses" class="link">See All..></a>	
</aside>
<h3 class="name">Accessories</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button5">   <   </button>
</div>
<div class="center" id="content5">

         <?php while($row = mysqli_fetch_assoc($Acc)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button5">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Accs" class="link">See All..></a>	
</aside>
<h3 class="name">Shoes</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button6">   <   </button>
</div>
<div class="center" id="content6">

        <?php while($row = mysqli_fetch_assoc($Shoes)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button6">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Shoes" class="link">See All..></a>	
</aside>
<h3 class="name">Sandals</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button7">   <   </button>
</div>
<div class="center" id="content7">

         <?php while($row = mysqli_fetch_assoc($Sandals)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button7">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Sandals" class="link">See All..></a>	
</aside>
<h3 class="name">Boots</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button8">   <   </button>
</div>
<div class="center" id="content8">

         <?php while($row = mysqli_fetch_assoc($Boots)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button8">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Boots" class="link">See All..></a>	
</aside>
<h3 class="name">Bags</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button9">   <   </button>
</div>
<div class="center" id="content9">

         <?php while($row = mysqli_fetch_assoc($Bags)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>

</div>
<div class="right">
   <button id="right-button9">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Women&Type=Bags" class="link">See All..></a>	
</aside>
<script>
	const rightBtn1 = document.querySelector('#right-button1');
const leftBtn1 = document.querySelector('#left-button1');

rightBtn1.addEventListener("click", function(event) {
  const conent1 = document.querySelector('#content1');
  conent1.scrollLeft += 300;
  event.preventDefault();
});

leftBtn1.addEventListener("click", function(event) {
  const conent1 = document.querySelector('#content1');
  conent1.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn2 = document.querySelector('#right-button2');
const leftBtn2 = document.querySelector('#left-button2');

rightBtn2.addEventListener("click", function(event) {
  const conent2 = document.querySelector('#content2');
  conent2.scrollLeft += 300;
  event.preventDefault();
});

leftBtn2.addEventListener("click", function(event) {
  const conent2 = document.querySelector('#content2');
  conent2.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn3 = document.querySelector('#right-button3');
const leftBtn3 = document.querySelector('#left-button3');

rightBtn3.addEventListener("click", function(event) {
  const conent3 = document.querySelector('#content3');
  conent3.scrollLeft += 300;
  event.preventDefault();
});

leftBtn3.addEventListener("click", function(event) {
  const conent3 = document.querySelector('#content3');
  conent3.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn4 = document.querySelector('#right-button4');
const leftBtn4 = document.querySelector('#left-button4');

rightBtn4.addEventListener("click", function(event) {
  const conent4 = document.querySelector('#content4');
  conent4.scrollLeft += 300;
  event.preventDefault();
});

leftBtn4.addEventListener("click", function(event) {
  const conent4 = document.querySelector('#content4');
  conent4.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn5 = document.querySelector('#right-button5');
const leftBtn5= document.querySelector('#left-button5');

rightBtn5.addEventListener("click", function(event) {
  const conent5 = document.querySelector('#content5');
  conent5.scrollLeft += 300;
  event.preventDefault();
});

leftBtn5.addEventListener("click", function(event) {
  const conent5 = document.querySelector('#content5');
  conent5.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn6 = document.querySelector('#right-button6');
const leftBtn6 = document.querySelector('#left-button6');

rightBtn6.addEventListener("click", function(event) {
  const conent6 = document.querySelector('#content6');
  conent6.scrollLeft += 300;
  event.preventDefault();
});

leftBtn6.addEventListener("click", function(event) {
  const conent6 = document.querySelector('#content6');
  conent6.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn7 = document.querySelector('#right-button7');
const leftBtn7 = document.querySelector('#left-button7');

rightBtn7.addEventListener("click", function(event) {
  const conent7 = document.querySelector('#content7');
  conent7.scrollLeft += 300;
  event.preventDefault();
});

leftBtn7.addEventListener("click", function(event) {
  const conent7 = document.querySelector('#content7');
  conent7.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn8 = document.querySelector('#right-button8');
const leftBtn8 = document.querySelector('#left-button8');

rightBtn8.addEventListener("click", function(event) {
  const conent8 = document.querySelector('#content8');
  conent8.scrollLeft += 300;
  event.preventDefault();
});

leftBtn8.addEventListener("click", function(event) {
  const conent8 = document.querySelector('#content8');
  conent8.scrollLeft -= 300;
  event.preventDefault();
});

const rightBtn9 = document.querySelector('#right-button9');
const leftBtn9= document.querySelector('#left-button9');

rightBtn9.addEventListener("click", function(event) {
  const conent9 = document.querySelector('#content9');
  conent9.scrollLeft += 300;
  event.preventDefault();
});

leftBtn9.addEventListener("click", function(event) {
  const conent9 = document.querySelector('#content9');
  conent9.scrollLeft -= 300;
  event.preventDefault();
});


</script>

</body>
</html>