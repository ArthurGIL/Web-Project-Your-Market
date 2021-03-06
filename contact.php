<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Contact</title>
	<link rel="stylesheet" href="Market.css" type="text/css" />
	<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
	</script>
</head>

<body onload="zoom()">
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Contact</i></div>
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

<h2>Contact Us</h2>
<div id="content">
    <form action="test_cookies.php?contact=home" method="post">
        <ul>
            User Name:<br>
            <input type="text" name="userId"> <br>
            <br>

            Object:<br>
            <input type="text" name="object"> <br>
            <br>

            E-mail:<br>
            <input type="mail" name="email"> <br>
            <br>

            Message :<br>
            <TEXTAREA name="Comments" rows=8 cols=40 wrap></TEXTAREA> <br>
            <br>

            <button class="button4">Send</button>
            <button class="button4">Reset</button>
        </ul>
    </form>
</div>

<br>
<br>
<div id="footer">
	<div id="footText">Connexion</div>
</div>

	<?php
	
	?>

</body>
</html>