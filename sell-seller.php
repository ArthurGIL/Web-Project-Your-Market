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

            <p>Name of the article :</p>
            <input type="text" name="itemName" required>
            <br><br>
            <div>
                <label>Select Image File:</label>
                <br>
                <input type="file" name="image"required>


            </div>


            <br><br>
            Description :<br>

            <TEXTAREA name="Description" rows=8 cols=100 wrap="soft" required></TEXTAREA><br>
    </div>
    <p>Price : </p>
    <input type="number" min="0" name="priceItem"required step="0.01">

    <br>

    <p>How would you like to sell it ?</p>
    <p>Auction : <input type="radio" name="auction" value="Auction" ></p>

    <p>Instant buy : <input type="radio" name="instant" value="Instant buy"></p>

   <p>Best offer : <input type="radio" name="bestOffer" value="Best Offer" ></p>

    <input type="submit" name="submit" value="ADD TO SELL">
</div>


</form>
<br><br>




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