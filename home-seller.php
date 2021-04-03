
<?php
if (isset($_GET["errorCart"])){
    switch ($_GET["errorCart"]){
        case 0 :
            echo "<script>alert('Item added to your cart successfully')</script>";
            break;
        case 1 :
            echo "<script>alert('You can not add your item to your cart')</script>";
            break;
        case 2 :
            echo "<script>alert('The item is already in your cart')</script>";
            break;
        default:
            break;

    }
}
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
	<a href="yourAccount-seller.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-seller.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-seller.php" title="Home"><button class="button">
		Home</button></a>
	<a href="cars-seller.php" title="Cars"><button class="button">
		Cars</button></a>
	<a href="clothing-seller.php" title="Clothing"><button class="button">
		Clothing</button></a>
	<a href="contact-seller.php" title="To contact us"><button class="button">
		To contact us</button></a>
</div>

<hr>
<br>

<h2>About <i>Your Market ©</i></h2>
<div id="content">
	<p>Liahozco aochalcalc cazcma caoc oacoazcaocamcacpajcpazjcpajzcp azuc achoazcaoch aichazchaca ac aacaochaiochao zicha zohcaoiczhahcaoicha oazhoahcaochaoizchaozc oachzaochao.
	Jvzepmvçzvzuvpuzvuzevuzv zvuzvuzepvuzpvuz vzvzuv zevzoemv uzoveu zevzv.
	Apjvpervoev.
	</p>
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