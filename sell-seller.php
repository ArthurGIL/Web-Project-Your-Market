<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Market - Sell</title>
    <link rel="stylesheet" href="Market.css" type="text/css"/>
    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%"
        }
        function check() {
            if (document.getElementById('anAuction').checked) {
                document.getElementById('date').required = true;
            }
            if (document.getElementById('aDirectPrice').checked) {
                document.getElementById('dPrice').required = true;
            }
        }
    </script>
</head>

<body onload="zoom()">
<div id="title">
    <h1>Your Market</h1>
</div>
<div id="sub"><i>- Sell</i></div>
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
        <button class="buttonBack">< Back</button>
    </a>
</div>

<hr>

<h2>Sell an item :</h2>
<div id="content">
    <div id="sellDesc">
        <form action="test_cookies.php?uploadImage=<?= $_SESSION["user"]["iduser"] ?>&category=<?=$_GET["category"] ?>" method="post"
              enctype="multipart/form-data">

            <b>Name of the article : </b><input type="text" name="itemName" required>
            <br><br>
            <div>
                <label><b>Select Image File :</b></label>
                <input type="file" name="image"required>
            </div>
            <br>
            <b>Description :</b><br>
            <TEXTAREA name="Description" rows=8 cols=100 wrap="soft" required></TEXTAREA><br>
    </div>
</div>

<br><br>

<h2>How would you like to sell it ?</h2>
<div id="pay_grid">
    <div id="auction">
        <h3>Auction :</h3>
        <input type="radio" name="paymentMethod" value="Auction" id="anAuction" >
        <b id="cBid" class="data">Launch an Auction</b>
        <br><br>
        Auction ends the :
        <input type="date" id="date" name="dateStart">
    </div>

    <div id="directPrice">
        <h3>Instant Buy :</h3>
        <input type="radio" name="paymentMethod" value="Instant buy" id="aDirectPrice" checked>
        <b id="aPrice" class="data">Launch a normal sale</b>
        <br><br>
        Asking price :
        <input type="number" id="dPrice" name="priceItem"> Euros
    </div>

    <div id="bestOffer">
        <h3>Best Offer :</h3>
        <input type="radio" name="paymentMethod" value="Best Offer" id="aBestOffer" >
        <b id="cBid" class="data">Ask for the best offers</b>
    </div>
</div>
<br>
<br>
<input type="submit" name="submit" value="ADD TO SELL" class="button4" onclick="check()">

</form>

<br>
<br>
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