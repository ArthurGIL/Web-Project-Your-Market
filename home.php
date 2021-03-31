<?php
require 'test_cookies.php';


/*session_start();

$_SESSION["item"] = [["blabla", "blabla"]];
$test = array("test", "test");
array_push($_SESSION["item"], $test);
echo $_SESSION["item"][0][0];
echo count($_SESSION["item"] );*/


?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Market</title>
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
<div id="sub"><i>- Home</i></div>
<div id="optButtons">
    <a href="connexion.php" title="Connexion">
        <button class="buttonConnex">Connexion</button>
    </a>
    <a href="cart.php" title="You must be connected and a seller to have a cart (see 'Connexion')">
        <button class="buttonCart" disabled>Cart</button>
    </a>
</div>

<hr>

<div id="nav">
    <a href="home.php" title="Home"><button class="button">Home</button></a>
    <a href="cars.php" title="Cars"><button class="button">Cars</button></a>
    <a href="clothing.php" title="Clothing"><button class="button">Clothing</button></a>
    <a href="contact.php" title="To contact us"><button class="button">To contact us</button></a>
</div>

<hr>
<br>

<h2>About <i>Your Market ©</i></h2>

<?php
getAllItems();

?>



<?php foreach ($_SESSION['item'] as $itemSelected) : ?>


<div style="background: palevioletred">

    item id : <?= $itemSelected[0] ?>
    <br>
    Name : <?= $itemSelected[1] ?>
    <br>
    Descritpion :  <?= $itemSelected[2] ?>
    <br>
    Price :           <?= $itemSelected[3] ?>
    <br>

    <form action="test_cookies.php?itemID=<?=$itemSelected[0]?>" method="post">

        <input type="submit" name="deleteItem" value="Delete Item">

    </form>

</div>

<?= "<br>" ?>

<?php endforeach; ?>

<?php
getAllUsers();


?>

<?php foreach ($_SESSION['user'] as $itemSelected) : ?>
    <div style="background: palegoldenrod">

        User id : <?= $itemSelected[0] ?>
        <br>
        Name :<?= $itemSelected[1] ?>
        <br>
        Email :<?= $itemSelected[2] ?>
        <br>
        Password :<?= $itemSelected[3] ?>
        <br>
        is he a seller ? : <?= $itemSelected[4] ?>


        <form action="test_cookies.php?UserId=<?=$itemSelected[0]?>" method="post">

            <input type="submit" name="deleteUser" value="Delete Item">

        </form>
    </div>
    <?= "<br>" ?>
<?php endforeach; ?>

<div id="content">




</div>

<br>
<br>
<div id="footer">
    <div id="footText">Connexion</div>
</div>

<?php

?>

</body>
</html>