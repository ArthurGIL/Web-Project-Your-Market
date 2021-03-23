<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Details</title>
	<link rel="stylesheet" href="Market.css" type="text/css" />
</head>

<body>
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Details</i></div>
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
<br>

<div id="content">
	-----image-----
	<br>
	-----prix-----
	<br>
</div>
<h2>Description :</h2>
<div id="content">
	bfbd
</div>

<br>

<div id="pay_grid">
	<div id="auction">
		<h3>Auction :</h3>
		<b id="cBid" class="data">Current bid :</b>
		<br>
		<label for="number1">Enter your bid (€) :</label>
		<input type="number" id="number1" name="bid" min="">
		<br>
		<br>
		<button onclick="bid()" class="button3">Bid</button>
	</div>

	<div id="directPrice">
		<h3>Instant Buy :</h3>
		<b id="aPrice" class="data">Asking Price :</b>
		<br>
		<br>
		<button onclick="buy()" class="button3">Buy</button>
	</div>

	<div id="bestOffer">
		<h3>Best Offer :</h3>
		<label for="number2">Enter your offer (€) :</label>
		<input type="number" id="number2" name="bOffer">
		<br>
		<br>
		<button onclick="offer()" class="button3">Offer</button>
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