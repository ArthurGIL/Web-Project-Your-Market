<?php
require "test_cookies.php";
if (isset($_GET["idItemDetail"])) {
    getItemDetails($_GET["idItemDetail"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Market - Details</title>
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
<div id="sub"><i>- Details</i></div>
<div id="optButtons">
    <a href="connexion.php" title="Connexion">
        <button class="buttonConnex">Connexion</button>
    </a>
    <a href="cart-buyer.php" title="Cart">
        <button class="buttonCart" disabled>Cart</button>
    </a>
</div>

<hr>

<div id="nav">
    <a href="home.php" title="Home">
        <button class="buttonBack">< Back</button>
    </a>
</div>

<hr>
<br>

<h3>Name : <?= $_SESSION["itemDetail"] [1] ?></h3>
<div id="content">
    <img src="data:image/jpeg;base64,<?= base64_encode($_SESSION["itemDetail"] [5]) ?>" height="300px"
         width="300px"/>
    <br>
</div>

<h2>Description :</h2>
<div id="content">
    <?= $_SESSION["itemDetail"] [2] ?>
</div>

<br>



<div id="pay_grid">

    <?php if ($_SESSION["itemDetail"] [6] == "Auction"):  ?>
        <div id="auction">
            <h3>Auction :</h3>
            <b id="cBid" class="data">Current bid :</b>
            <br>
            <label for="number1">Enter your bid (Euros) :</label>
            <input type="number" id="number1" name="bid" min="">
            <br>
            <br>
            <button onclick="bid()" class="button3" disabled>Bid</button>
        </div>

    <?php endif;?>

    <?php if ($_SESSION["itemDetail"] [6] == "Instant buy"):  ?>
        <div id="directPrice">
            <h3>Instant Buy :</h3>
            <b id="aPrice" class="data">Asking Price :</b>
            <br>
            <br>
            <button onclick="buy()" class="button3" disabled>Buy</button>
        </div>

    <?php endif ?>
    <?php if ($_SESSION["itemDetail"] [6] == "Best Offer"):  ?>
        <div id="bestOffer">
            <h3>Best Offer :</h3>
            <label for="number2">Enter your offer (Euros) :</label>
            <input type="number" id="number2" name="bOffer">
            <br>
            <br>
            <button onclick="offer()" class="button3" disabled>Offer</button>
        </div>

    <?php endif ?>
</div>

<br>
<br>
<div id="footer">
    <div id="footText">Connexion</div>
</div>


</body>
</html>