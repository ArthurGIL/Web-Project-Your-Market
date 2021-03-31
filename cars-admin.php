<!DOCTYPE html>
<html>
<head>
    <title>Your Market - Cars</title>
    <link rel="stylesheet" href="Market.css" type="text/css" />
    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%"
        }
    </script>
</head>

<body onload="zoom()">
<?php
require 'test_cookies.php';
?>

<div id="title">
    <h1>Your Market</h1>
</div>
<div id="sub"><i>- Cars</i></div>
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
<div id="sell">
    <a href="sell-admin.php" title="Sell"><button class="button4">Sell</button></a>
</div>

<div id="grid_container">
    <?php getCarItems(); ?>

    <?php foreach ($_SESSION['item'] as $itemSelected) : ?>

        <div id="item">
            <img id="objPos" src="peugeot-208.jpg" length=200 width=200><br><br>
            <?= $itemSelected[1] ?><br>
            <?= $itemSelected[3] ?>€<br><br>
            <a href="details-admin.php" title="Car Details">
                <button class="button2">More Details</button>
            </a>
        </div>
    <?php endforeach; ?>
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