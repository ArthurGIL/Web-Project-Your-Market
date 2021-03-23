<!DOCTYPE html>
<html>
<head>
	<title>Your Market - Your Account</title>
	<link rel="stylesheet" href="Market.css" type="text/css" />
</head>

<body>
<div id="title">
	<h1>Your Market</h1>
</div>
<div id="sub"><i>- Your Account</i></div>
<div id="optButtons">
	<a href="admin.php" title="Admin"><button class="buttonAdmin">Admin</button></a>
	<a href="yourAccount-admin.php" title="YourAccount"><button class="buttonAccount">Your Account</button></a>
	<a href="cart-admin.php" title="Cart"><button class="buttonCart">Cart</button></a>
</div>

<hr>

<div id="nav">
	<a href="home-admin.php" title="Home"><button class="buttonBack">< Back</button></a>
</div>

<hr>

<h2>Your Account :</h2>
<div id="content">
	<div id="account">
		<b id="aFName">Fistname : <input type="text" name="fName" readonly></b><br><br>
		<b id="aLName">Lastname : <input type="text" name="lName" readonly></b><br><br>
		<b id="aMail">E-mail : <input type="E-mail" name="eMail" readonly></b><br><br>
		<b id="aPay">Payement : <input type="text" name="ePay" readonly></b>
	</div>
</div>
<br>
<h2>Users List :</h2>
<div id="content">
	
</div>

<br>
<div id="footer">
	Admin
</div>

	<?php
	
	?>

</body>
</html>