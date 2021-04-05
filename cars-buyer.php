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
    <a href="yourAccount-buyer.php" title="YourAccount">
        <button class="buttonAccount">Your Account</button>
    </a>
    <a href="cart-buyer.php" title="Cart">
        <button class="buttonCart">Cart</button>
    </a>
</div>

<hr>

<div id="nav">
    <a href="home-buyer.php" title="Home">
        <button class="button">Home</button>
    </a>
    <a href="cars-buyer.php" title="Cars">
        <button class="button">Cars</button>
    </a>
    <a href="clothing-buyer.php" title="Clothing">
        <button class="button">Clothing</button>
    </a>
    <a href="contact-buyer.php" title="To contact us">
        <button class="button">To contact us</button>
    </a>
</div>

<hr>

<br>
<div id="sell">
    <a href="sell-buyer.php" title="You must be registered as a seller to sell an item (see 'Your Account')">
        <button class="button4" disabled="">Sell</button>
    </a>
</div>

<div id="grid_container">
    <?php getCarItems(); ?>

    <?php foreach ($_SESSION['item'] as $itemSelected) : ?>
        <div id="item">
            <img src="data:image/jpeg;base64,<?= base64_encode($itemSelected[5]) ?>" height="200px"
                 width="200px"/><br>
            <h3><?= $itemSelected[1] ?></h3>
            <?php if ($itemSelected [6] == "Instant buy"):  ?>
                <?= $itemSelected[3] ?>  Euros
            <?php endif ?>
            <br><br>
            <b>Type of sell :</b> <?= $itemSelected[6] ?>
            <br><br>
            <a href="details-buyer.php?idItemDetail=<?= $itemSelected[0] ?>" title="Details">
                <button class="button2">More Details</button>
            </a>
            <br>
            <br>
            <?php if ($itemSelected [4] != $_SESSION["user"]["iduser"]):  ?>

                <a href="test_cookies.php?idItemCart=<?= $itemSelected[0] ?>&idUserCart=<?= $_SESSION["user"]["iduser"] ?>&idUserSeller=<?= $itemSelected[4] ?>"
                   title="Car Details">
                    <button class="buttonAddCart">Add to cart</button>
                </a>
            <?php endif ?>

        </div>

    <?php endforeach; ?>
</div>

<br>
<br>
<div id="footer">
    <div id="footText">Buyer</div>
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