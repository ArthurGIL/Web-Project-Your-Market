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
</head>

<body>
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Home</i></div>
<div id="optButtons">
	<a href="connexion.php" title="Connexion"><button class="buttonConnex">Connexion</button></a>
	<a href="cart.php" title="You must be connected and a seller to have a cart (see 'Connexion')"><button class="buttonCart" disabled>Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home.php" title="Home"><button class="button">
		Home</button></a>
	<a href="cars.php" title="Cars"><button class="button">
		Cars</button></a>
	<a href="clothing.php" title="Clothing"><button class="button">
		Clothing</button></a>
	<a href="contact.php" title="To contact us"><button class="button">
		To contact us</button></a>
</div>

<hr>
<br>

<h2>About <i>Your Market ©</i></h2>

<?php
getAllItems();

foreach ($_SESSION['item'] as $itemSelected) {
    echo '<p>' . $itemSelected[1].'
	</p>';
}


?>
<div id="content">


    <?php
    getAllUsers();

    foreach ($_SESSION['user'] as $itemSelected) {
        echo '<p>' . $itemSelected[1].'
	</p>';
    }


    ?>
</div>

<br>
<div id="footer">
	Connexion
</div>

	<?php
	
	?>

</body>
</html>