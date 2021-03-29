<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Admin</title>
	<link rel="stylesheet" href="Market.css" type="text/css" />
</head>

<body>
<?php
	require 'test_cookies.php';
?>

<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Admin</i></div>
<div id="optButtons">
	<a href="admin.php" title="Admin"><button class="buttonAdmin">Admin</button></a>
	<a href="yourAccount-admin.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-admin.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-admin.php" title="Home"><button class="buttonBack">< Back</button></a>
</div>

<hr>

<h2>User List :</h2>
<div id="content">
	<div id="container">
		<?php getAllUsers(); ?>

		<?php foreach ($_SESSION['user'] as $itemSelected) : ?>

	    <div id="containerInfo" style="background: palegoldenrod">
	        <b>User id : </b><?= $itemSelected[0] ?>
	        <br>
	        <b>Name : </b><?= $itemSelected[1] ?>
	        <br>
	        <b>Email : </b><?= $itemSelected[2] ?>
	        <br>
	        <b>Password : </b><?= $itemSelected[3] ?>
	        <br>
	        <b>Seller : </b><?= $itemSelected[4] ?>

	        <form action="test_cookies.php?UserId=<?=$itemSelected[0]?>" method="post">
	            <input type="submit" name="deleteItem" class="buttonDel" value="Delete">
	        </form>
	    </div>

		<?php endforeach; ?>
	</div>
</div>

<br>
<h2>Item List :</h2>
<div id="content">
	<div id="container">
		<?php getAllItems(); ?>

		<?php foreach ($_SESSION['item'] as $itemSelected) : ?>

		<div id="containerInfo" style="background: lightblue">
		    <b>Item id : </b><?= $itemSelected[0] ?>
		    <br>
		    <b>Name : </b><?= $itemSelected[1] ?>
		    <br>
		    <b>Descritpion : </b><?= $itemSelected[2] ?>
		    <br>
		    <b>Price : </b><?= $itemSelected[3] ?>
		    <br>

		    <form action="test_cookies.php?itemID=<?=$itemSelected[0]?>" method="post">
		        <input type="submit" name="deleteItem" class="buttonDel" value="Delete">
		    </form>
		</div>

		<?php endforeach; ?>
	</div>
</div>

<br>
<h2>Aunctions ongoing :</h2>
<div id="content">
	<div id="container">

	</div>
</div>

<br>
<h2>Best Offers ongoing :</h2>
<div id="content">
	<div id="container">
		
	</div>
</div>

<br>
<div id="footer">
	Admin
</div>

	<?php
	
	?>

</body>
</html>