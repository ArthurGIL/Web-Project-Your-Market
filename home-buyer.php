<?php
if (isset($_GET["errorCart"])){
    switch ($_GET["errorCart"]){
        case 0 :
            echo "<script>alert('Item added to your cart successfully')</script>";
            break;
        case 1 :
            echo "<script>alert('You can not add your item to your cart')</script>";
            break;
        case 2 :
            echo "<script>alert('The item is already in your cart')</script>";
            break;
        default:
            break;

    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Your Market</title>
	<link rel="stylesheet" href="Market.css" type="text/css"/>
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
<div id="sub"><i>- Home</i></div>
<div id="optButtons">
	<a href="yourAccount-buyer.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-buyer.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-buyer.php" title="Home"><button class="button">
		Home</button></a>
	<a href="cars-buyer.php" title="Cars"><button class="button">
		Cars</button></a>
	<a href="clothing-buyer.php" title="Clothing"><button class="button">
		Clothing</button></a>
	<a href="contact-buyer.php" title="To contact us"><button class="button">
		To contact us</button></a>
</div>

<hr>
<br>

<h2>About <i>Your Market ©</i></h2>
<div id="content">
    <p style="font-size:  20px">
        Welcome to our website !<br>
        <br>
        Here, you can buy and sell cars or clothing you don't use anymore.
        We have three different options to sell your items : be sure to check the <i>Auction</i>, the <i>Instant buy</i> and the <i>Best Offer</i> to sell your items at the price you want.
    </p>
</div>

<br>
<br>
<div id="footer">
	<div id="footText">Buyer</div>
	<div id="footBlock"></div>
	<div id="Deconnexion">
		<a href="test_cookies.php?deco=1" title="Deconnexion"><button class="buttonDeco">Deconnexion</button></a>
	</div>
</div>

	<?php
	
	?>

</body>
</html>