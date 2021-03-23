<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Clothing</title>
	<link rel="stylesheet" href="Market.css" type="text/css" />
</head>

<body>
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Clothing</i></div>
<div id="optButtons">
	<a href="connexion.php" title="Connexion"><button class="buttonConnex">Connexion</button></a>
	<a href="cart.php" title="You must be connected and a seller to have a cart (see 'Connexion')"><button class="buttonCart" disabled>Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home.php" title="Home"><button class="button">Home</button></a>
	<a href="cars.php" title="Cars"><button class="button">Cars</button></a>
	<a href="clothing.php" title="Clothing"><button class="button">Clothing</button></a>
	<a href="contact.php" title="To contact us"><button class="button">To contact us</button></a>
</div>

<hr>

<br>
<div id="sell">
	<a href="sell-buyer.php" title="You must be conected and a seller to sell an item (see 'Connexion')"><button class="button4" disabled="">Sell</button></a>
</div>

<div id="grid_container">
	<div id="cloth">
		<img id="objPos" src="citroen-AX.jpg" length=200 width=200><br><br>
		<i id="carName">Citroen AX</i><br><br>
		<a href="details.php" title="Car Details"><button class="button2">More Details</button></a>
	</div>

	<div id="cloth">
		<img id="objPos" src="peugeot-208.jpg" length=200 width=200><br><br>
		<i id="carName">Peugeot 208</i><br><br>
		<a href="details.php" title="Car Details"><button class="button2">More Details</button></a>
	</div>

	<div id="cloth">
		<img id="objPos" src="ford-focus-3.jpg" length=200 width=200><br><br>
		<i id="carName">Ford Focus 3</i><br><br>
		<a href="details.php" title="Car Details"><button class="button2">More Details</button></a>
	</div>

	<div id="cloth">
		<img id="objPos" src="audi-a3-sportback.jpg" length=200 width=200><br><br>
		<i id="carName">Audi A3 Sportback</i><br><br>
		<a href="details.php" title="Car Details"><button class="button2">More Details</button></a>
	</div>

	<div id="cloth">
		<img id="objPos" src="volkswagen-golf.jpg" length=200 width=200><br><br>
		<i id="carName">Volkswagen Golf</i><br><br>
		<a href="details.php" title="Car Details"><button class="button2">More Details</button></a>
	</div>

	<div id="cloth">
		<img id="objPos" src="toyota-aygo.jpg" length=200 width=200><br><br>
		<i id="carName">Toyota Aygo</i><br><br>
		<a href="details.php" title="Car Details"><button class="button2">More Details</button></a>
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