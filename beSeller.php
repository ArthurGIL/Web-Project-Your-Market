<!DOCTYPE html>
<html>
<head>
    <title>Your Market - Become a seller</title>
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
<div id="sub"><i>- Become a seller</i></div>
<div id="optButtons">
    <a href="yourAccount-buyer.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
    <a href="cart-buyer.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
    <a href="yourAccount-buyer.php" title="Home"><button class="buttonBack">< Back</button></a>
</div>

<hr>

<h2>Your Account :</h2>
<div id="content">
    You agree to ...<br>
    <br>
    <a href="test_cookies.php?beSeller=1" title="beSeller"><button class="button4">Confirm</button></a>
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