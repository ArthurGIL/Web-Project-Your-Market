<?php

session_start();
if (isset($_SESSION["user"]) && !$_SESSION["user"]["admin"] == 1 ){
    header("Location:connexion.php?errorUrl=1");
}


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
	<a href="admin.php" title="Admin"><button class="buttonAdmin">Admin</button></a>
	<a href="yourAccount-admin.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-admin.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-admin.php" title="Home"><button class="button">
		Home</button></a>
	<a href="cars-admin.php" title="Cars"><button class="button">
		Cars</button></a>
	<a href="clothing-admin.php" title="Clothing"><button class="button">
		Clothing</button></a>
	<a href="contact-admin.php" title="To contact us"><button class="button">
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
<div id="footer">
	Admin
</div>

	<?php
	
	?>

</body>
</html>