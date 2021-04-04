
<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Market - CreateAccount</title>
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
<div id="sub"><i>- Add Payment method</i></div>
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
    <a href="connexion.php" title="Home">
        <button class="buttonBack">< Back</button>
    </a>
</div>

<hr>

<h2>Create your account</h2>
<div id="content">
    <br>
    <form action="test_cookies.php" method="post">

       <h1>Welcome <?= $_SESSION["user"]["name"]?>, please enter your payment info.</h1>


        Address 1: <input type="text" name="address1" required>
        <br><br>

        Address 2 : <input type="text" name="address2">
        <br><br>

        City : <input type="text" name="city">
        <br><br>

        Postal Code : <input type="number" name="postalCode"required>
        <br><br>

        Country : <input type="text" name="country"required>
        <br><br>

        Phone number : <input type="tel"  name="phone"
                              pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"required>
        <small>Format: 12-34-56-78-90</small>
        <br><br>

        Card Type : <select name="cardType" id="pet-select" required >
            <option value="">--Please choose an option--</option>
            <option value="Visa">Visa</option>
            <option value="MasterCard">MasterCard</option>
            <option value="American Express">American Express</option>
            <option value="Paypal">Paypal</option>

        </select>
        <br><br>

        Card number : <input type="tel" name="cardNumber"
                             pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}"required>
        <small>Format: 0000-0000-0000-0000</small>
        <br><br>

        Name on card : <input type="text" name="cardName"required>
        <br><br>

        Expiration date : <input type="date" name="cardDate"required>
        <br><br>

        Security code : <input type="tel"  name="securityCode"
                               pattern="[0-9]{3}" maxlength="3"required>
        <small>Format: 000</small>
        <br><br>


        <br><br>
        <input type="submit" name="submitPayment" class="button4">
    </form>

</div>

<br>
<br>
<div id="footer">
    <div id="footText">Connexion</div>
</div>



</body>

</html>
