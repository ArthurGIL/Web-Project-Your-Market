
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
    </div>

    <table border="1" >
        <?php getPaymentInfo(); ?>
        <tr id="address1">
            <td>
                Address 1 :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][2] ?>
            </td>
        </tr>
        <tr id="address2">
            <td>
                address 2 :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][3] ?>
            </td>
        </tr>
        <tr id="city">
            <td>
                City :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][4] ?>
            </td>
        </tr>
        <tr id="postalCode">
            <td>
                Postal code :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][5] ?>
            </td>
        </tr>
        <tr id="country">
            <td>
                Country :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][6] ?>
            </td>
        </tr>
        <tr id="phone">
            <td>
                Phone number :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][7] ?>
            </td>
        </tr>
        <tr id="typeCard">
            <td>
                Type of your card :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][8] ?>
            </td>
        </tr>
        <tr id="cardNumber">
            <td>
                Your card number :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][9] ?>
            </td>
        </tr>
        <tr id="nameCard">
            <td>
                Name on the card :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][10] ?>
            </td>
        </tr>

        <tr id="expDate">
            <td>
                Expiration date :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][11] ?>
            </td>
        </tr>
        <tr id="digiCode">
            <td>
                Secret code :
            </td>
            <td>
                <?= $_SESSION["paymentInfo"][12] ?>
            </td>
        </tr>


    </table>
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