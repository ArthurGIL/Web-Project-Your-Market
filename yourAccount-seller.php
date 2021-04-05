

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
<?php
	require 'test_cookies.php';
?>
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Your Account</i></div>
<div id="optButtons">
	<a href="yourAccount-seller.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-seller.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-seller.php" title="Home"><button class="buttonBack">< Back</button></a>
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
</div>
<br>

<h2>Your Items :</h2>
<div id="grid_container_account">
    <?php getSellingItems(); ?>

    <?php foreach ($_SESSION['item'] as $itemSelected) : ?>

    <div id="item">
        <img src="data:image/jpeg;base64,<?= base64_encode($itemSelected[5]) ?>" height="200px"
             width="200px"/><br>
        <h3><?= $itemSelected[1] ?></h3>
        <?= $itemSelected[3] ?> Euros
        <br><br>
        <b>Type of sell :</b> <?= $itemSelected[6] ?>
        <br><br>
        <a href="details-admin.php?idItemDetail=<?= $itemSelected[0] ?>" title="Car Details">
            <button class="button2">More Details</button>
        </a>
        <br>
        <br>
        <form action="test_cookies.php?itemID=<?=$itemSelected[0]?>" method="post">
            <div id="delItemAccount">
                <input type="submit" name="deleteItem" class="buttonDel" value="Delete">
            </div>
        </form>
    </div>
    <?php endforeach; ?>
</div>

<br><br>

<h2>Your Sold Items :</h2>
<div id="grid_container_account">
    <?php getSellingItemsSold(); ?>

    <?php foreach ($_SESSION['item'] as $itemSelected) : ?>

        <div id="item">
            <img src="data:image/jpeg;base64,<?= base64_encode($itemSelected[5]) ?>" height="200px"
                 width="200px"/><br><br>
            <?= $itemSelected[1] ?><br>
            <?= $itemSelected[3] ?> Euros<br>
            <?= $itemSelected[2] ?><br><br>
            <!--<form action="test_cookies.php?UserId=<?/*=$itemSelected[0]*/?>" method="post">
                <div id="delItemAccount">
                    <input type="submit" name="deleteItem" class="buttonDel" value="Delete">
                </div>
            </form>-->
        </div>
    <?php endforeach; ?>
</div>


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