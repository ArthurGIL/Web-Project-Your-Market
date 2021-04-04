<!DOCTYPE html>
<html>
<head>
    <title>Your Market - Cars</title>
    <link rel="stylesheet" href="Market.css" type="text/css"/>
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
    <a href="yourAccount-seller.php" title="YourAccount">
        <button class="buttonAccount">Your Account</button>
    </a>
    <a href="cart-seller.php" title="Cart">
        <button class="buttonCart">Cart</button>
    </a>
</div>

<hr>

<div id="nav">
    <a href="home-seller.php" title="Home">
        <button class="button">Home</button>
    </a>
    <a href="cars-seller.php" title="Cars">
        <button class="button">Cars</button>
    </a>
    <a href="clothing-seller.php" title="Clothing">
        <button class="button">Clothing</button>
    </a>
    <a href="contact-seller.php" title="To contact us">
        <button class="button">To contact us</button>
    </a>
</div>

<hr>

<br>
<div id="sell">
    <a href="sell-seller.php?category=1" title="Sell">
        <button class="button4">Sell</button>
    </a>
</div>

<div id="grid_container">
    <?php getCarItems(); ?>

    <?php foreach ($_SESSION['item'] as $itemSelected) : ?>

        <div id="item">
            <img src="data:image/jpeg;base64,<?= base64_encode($itemSelected[5]) ?>" height="200px"
                 width="200px"/><br>
            <?= $itemSelected[1] ?><br>
            <?= $itemSelected[3] ?> Euros
            <br><br>
            <b>Type of sell :</b> <?= $itemSelected[6] ?>
            <br><br>
            <a href="details-admin.php?idItemDetail=<?= $itemSelected[0] ?>" title="Car Details">
                <button class="button2">More Details</button>
            </a>
            <br>
            <br>
            <?php if ($itemSelected [4] != $_SESSION["user"]["iduser"]):  ?>

                <a href="test_cookies.php?idItemCart=<?= $itemSelected[0] ?>&idUserCart=<?= $_SESSION["user"]["iduser"] ?>&idUserSeller=<?= $itemSelected[4] ?>"
                   title="Car Details">
                    <button class="button2" style="width: 50%">Add to cart</button>
                </a>
            <?php endif ?>
            <?php if ($itemSelected [4] == $_SESSION["user"]["iduser"]):  ?>

                <h1>Your Item</h1>
            <?php endif ?>
        </div>

    <?php endforeach; ?>
</div>

<br>
<br>
<div id="footer">
    <div id="footText">Buyer - Seller</div>
    <div id="footBlock"></div>
    <div id="Deconnexion">
        <a href="test_cookies.php?deco=1" title="Deconnexion">
            <button class="buttonDeco">Deconnexion</button>
        </a>
    </div>
</div>

<?php

?>

</body>
</html>