<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Contact</title>
	<link rel="stylesheet" href="Market.css" type="text/css" />
</head>

<body>
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Contact</i></div>
<div id="optButtons">
	<a href="yourAccount-buyer.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-buyer.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-buyer.php" title="Home"><button class="button">Home</button></a>
	<a href="cars-buyer.php" title="Cars"><button class="button">Cars</button></a>
	<a href="clothing-buyer.php" title="Clothing"><button class="button">Clothing</button></a>
	<a href="contact-buyer.php" title="To contact us"><button class="button">To contact us</button></a>
</div>

<hr>
<br>

<h2>Contact Us</h2>
<div id="content">
	<form action=""> 
	<ul>
		User Name:<br>
		<input type="text" name="userId"> <br>
		<br>
		
		Password:<br>
		<input type="password" name="passwd"> <br>
		<br>
		
		E-mail:<br>
		<input type="mail" name="email"> <br>
		<br>

		Commentary :<br>
		<TEXTAREA name="Comments" rows=8 cols=40 wrap></TEXTAREA> <br>
		<br>

		<button class="button4">Send</button>
		<button class="button4">Reset</button>
	</ul>
	</form>
</div>

<br>
<div id="footer">
	Buyer
</div>

	<?php
	
	?>

</body>
</html>