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
	<a href="connexion.php" title="Connexion"><button class="buttonConnex">Connexion</button></a>
	<a href="cart.php" title="You must be connected and a seller to have a cart (see 'Connexion')"><button class="buttonCart" disabled>Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home.php" title="Home"><button class="buttonBack">< Back</button></a>
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
		<button onclick="bid()" class="button3" disabled>Bid</button>
	</div>

	<div id="directPrice">
		<h3>Instant Buy :</h3>
		<b id="aPrice" class="data">Asking Price :</b>
		<br>
		<br>
		<button onclick="buy()" class="button3" disabled>Buy</button>
	</div>

	<div id="bestOffer">
		<h3>Best Offer :</h3>
		<label for="number2">Enter your offer (€) :</label>
		<input type="number" id="number2" name="bOffer">
		<br>
		<br>
		<button onclick="offer()" class="button3" disabled>Offer</button>
	</div>
</div>

<br>
<div id="footer">
	Connexion
</div>

	<?php
	
	?>

</body>
</html>