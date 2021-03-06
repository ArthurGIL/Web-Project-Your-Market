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
	<a href="admin.php" title="Admin"><button class="buttonAdmin">Admin</button></a>
	<a href="yourAccount-admin.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-admin.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-admin.php" title="Home"><button class="button">Home</button></a>
	<a href="cars-admin.php" title="Cars"><button class="button">Cars</button></a>
	<a href="clothing-admin.php" title="Clothing"><button class="button">Clothing</button></a>
	<a href="contact-admin.php" title="To contact us"><button class="button">To contact us</button></a>
</div>

<hr>
<br>

<h2>Contact Us</h2>
<div id="content">
    <form action="test_cookies.php?contact=admin" method="post">
        <ul>
            User Name:<br>
            <input type="text" name="userId" required> <br>
            <br>

            Object:<br>
            <input type="text" name="object" required> <br>
            <br>

            E-mail:<br>
            <input type="mail" name="email" required> <br>
            <br>

            Message :<br>
            <TEXTAREA name="Comments" rows=8 cols=40  required></TEXTAREA>
            <br>
            <br>

            <button class="button4">Send</button>
            <button class="button4">Reset</button>
        </ul>
    </form>
</div>

<br>
<br>
<div id="footer">
	<div id="footText">Admin</div>
	<div id="footBlock"></div>
	<div id="Deconnexion">
		<a href="test_cookies.php?deco=1" title="Deconnexion"><button class="buttonDeco">Deconnexion</button></a>
	</div>
</div>

	<?php
	
	?>

</body>
</html>