
<?php
require "test_cookies.php"?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Cart</title>
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
<div id="sub"><i>- Cart</i></div>
<div id="optButtons">
	<a href="yourAccount-seller.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-seller.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-seller.php" title="Home"><button class="buttonBack">< Back</button></a>
</div>

<hr>

<h2>Your cart :</h2>
<div id="cart">

    <?php getItemCartUser();?>

    <?php foreach ($_SESSION['itemCart'] as $itemSelected): ?>

        <div id="containerInfo">
            <img src="data:image/jpeg;base64,<?= base64_encode($itemSelected[5]) ?>" height="100px"
                 width="100px"/><br>
            <b>Name : </b><?= $itemSelected[1] ?>
            <br>
            <b>Description : </b><?= $itemSelected[2] ?>
            <br>
            <b>Price : </b><?php if ($itemSelected [6] == "Instant buy"):  ?><?= $itemSelected[3] ?>  Euros<?php endif ?>
            <br>
            <b>Type : </b><?= $itemSelected[4] ?>

            <form action="test_cookies.php?idItemCartDelete=<?=$itemSelected[0]?>" method="post">
                <div id="delItemAdmin">
                    <input type="submit" name="deleteItem" class="buttonDel" value="Delete">
                </div>
            </form>
        </div>

    <?php endforeach; ?>
    <?php
    $idItemDeleteAfterBuy = array();
    foreach ($_SESSION['itemCart'] as $itemSelected){
        array_push($idItemDeleteAfterBuy,$itemSelected[0]);
    }
    ?>

</div>
<h3>TOTAL : <b id="totalPrice"><?= $_SESSION['totalPrice'][0]?></b> Euros</h3>

<br>
<br>
<div id="footer">
	<div id="footText">Buyer - Seller</div>
	<div id="footBlock"></div>
	<div id="Deconnexion">
		<a href="test_cookies.php?deco=1" title="Deconnexion"><button class="buttonDeco">Deconnexion</button></a>
	</div>
</div>

	<?php
	
	?>

</body>
</html>