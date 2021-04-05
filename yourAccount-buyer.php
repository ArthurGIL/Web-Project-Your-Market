
<?php
require "test_cookies.php"
?>


<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Your Account</title>
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
<div id="sub"><i>- Your Account</i></div>
<div id="optButtons">
	<a href="yourAccount-buyer.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-buyer.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-buyer.php" title="Home"><button class="buttonBack">< Back</button></a>
</div>

<hr>

<h2>Your Account :</h2>
<div id="content">
    <div id="account">
        <b id="aFName">Fistname : </b><?= $_SESSION["user"]["name"]?>
        <br><br>
        <b id="aLName">E-mail : </b><?= $_SESSION["user"]["email"]?>
        <br><br>
        <b id="aMail">Password : </b><?= $_SESSION["user"]["psw"]?>
        <br><br>
        <b id="aPay">Payement : </b><?= $_SESSION["payment"]["cardType"]?>
    </div>


	<div id="right">
    	<a href="beSeller.php" title="beSeller"><button class="button2">Become a seller</button></a>
  	</div>

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