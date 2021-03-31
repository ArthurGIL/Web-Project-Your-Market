<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Sell</title>
	<link rel="stylesheet" href="Market.css" type="text/css" />
</head>

<body>
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Sell</i></div>
<div id="optButtons">
	<a href="yourAccount-seller.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-seller.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-seller.php" title="Home"><button class="buttonBack">< Back</button></a>
</div>

<hr>

<h2>Sell an item :</h2>
<div id="content">
	<div id="sellDesc">
		<form method="post" enctype="multipart/form-data">
            <p>Name of the article :</p>
            <input type="text" name="itemName">
            <br><br>
			<div>
				<label for="file">Select an image for your product :</label>
                <br>
		   		<input type="file" id="file" name="file" value="Select a file">
		 	</div>
		 	<div>
		   		<button>Send</button>
		 	</div>
		</form>

		<br><br>
		Description :<br>
		<TEXTAREA name="Description" rows=8 cols=100 wrap></TEXTAREA><br>
	</div>
</div>

<br><br>

<h2>Sell method :</h2>
<div id="pay_grid">
	<div id="auction">
		<h3>Auction :</h3>
		<label for="number1">Starting bid (€) :</label>
		<input type="number" id="number1" name="bid" min="0">
		<br>
		<br>
		<button onclick="bid()" class="button3">Accept</button>
	</div>

	<div id="directPrice">
		<h3>Instant Buy :</h3>
		<label for="number1">Asking Price (€) :</label>
		<input type="number" id="number2" name="dPrice" min="0">
		<br><br>
		<button class="button3">Accept</button>
	</div>

	<div id="bestOffer">
		<h3>Best Offer :</h3>

		<br><br>
		<button class="button3">Accept</button>
	</div>
</div>

<br>
<div id="footer">
	Buyer - Seller
</div>

	<?php
	
	?>

</body>
</html>