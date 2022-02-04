<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Site - CSS/Men's.css">
	<title>Men`s</title>
</head>
<body>
   <?php 
   $conn=mysqli_connect("localhost","root","","blackandwhite");
   $querytop="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Men' AND items.Item_Type='Top' GROUP BY Item_ID Having Item_quantity>=1";
   $querypants="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Men' AND items.Item_Type='Pants' GROUP BY Item_ID Having Item_quantity>=1";
   $queryacc="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Men' AND items.Item_Type='Accs' GROUP BY Item_ID Having Item_quantity>=1";
   $queryshoes="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Men' AND items.Item_Type='Shoes' GROUP BY Item_ID Having Item_quantity>=1 ";
   $queryboots="SELECT * FROM `items` JOIN item_counter USING (Item_ID)  WHERE items.Item_Gender = 'Men' AND items.Item_Type='Boots' GROUP BY Item_ID Having Item_quantity>=1";
   $Top=mysqli_query($conn,$querytop);
   $Pants=mysqli_query($conn,$querypants);
   $Acc=mysqli_query($conn,$queryacc);
   $Shoes=mysqli_query($conn,$queryshoes);
   $Boots=mysqli_query($conn,$queryboots);
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
      <div class="link"><?= $row['Item_desc'] ?></div>
      <div class="link"><?= $row['Item_Price'] ?></div>
   </div></a>
   <?php } ?>
</div>
<div class="right">
   <button id="right-button1">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Men&Type=Top" class="link">See All..></a>	
</aside>

<h3 class="name">Pants</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button2">   <   </button>
</div>
<div class="center" id="content2">
         <?php while($row2 = mysqli_fetch_assoc($Pants)){?>
      <a href="Items Informations.php?ID=<?php echo $row['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row2['Item_desc'] ?></div>
      <div class="link"><?= $row2['Item_Price'] ?></div>
   </div></a>
   <?php } ?>
</div>
<div class="right">
   <button id="right-button2">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Men&Type=Pants" class="link">See All..></a>	
</aside>
<h3 class="name">Accessories</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button3">   <   </button>
</div>
<div class="center" id="content3">
   <?php while($row3 = mysqli_fetch_assoc($Acc)){?>
      <a href="Items Informations.php?ID=<?php echo $row3['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row3['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row3['Item_desc'] ?></div>
      <div class="link"><?= $row3['Item_Price'] ?></div>
   </div></a>
   <?php } ?>
</div>
<div class="right">
   <button id="right-button3">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Men&Type=Accs" class="link">See All..></a>	
</aside>
<h3 class="name">Shoes</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button4">   <   </button>
</div>
<div class="center" id="content4">
         <?php while($row4 = mysqli_fetch_assoc($Shoes)){?>
      <a href="Items Informations.php?ID=<?php echo $row4['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row4['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row4['Item_desc'] ?></div>
      <div class="link"><?= $row4['Item_Price'] ?></div>
   </div></a>
   <?php } ?>
</div>
<div class="right">
   <button id="right-button4">   >   </button>
</div><br>
</aside><aside class="link">
	<br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Men&Type=Shoes" class="link">See All..></a>	
</aside>
<h3 class="name">Boots</h3>
	<aside class="all">
<div class="left">
   
   <button id="left-button5">   <   </button>
</div>
<div class="center" id="content5">
         <?php while($row5 = mysqli_fetch_assoc($Boots)){?>
      <a href="Items Informations.php?ID=<?php echo $row5['Item_ID'];?>">
   <div class=internal> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row5['Item_IMG']); ?>" height="75%" width="100%" /> 
      <div class="link"><?= $row5['Item_desc'] ?></div>
      <div class="link"><?= $row5['Item_Price'] ?></div>
   </div></a>
   <?php } ?>
   </div>
</div>
<div class="right">
   <button id="right-button5">   >   </button>
</div>
</aside>
<aside class="link">
	<br><br><br><br><br><br><br><br><br><br><br><a href="See All.php?Gender=Men&Type=Boots" class="link">See All..></a>	
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
</script>
<?php 
mysqli_close($conn);
?>

</body>
</html>