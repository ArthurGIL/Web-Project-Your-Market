

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
<div id="sub"><i>- Create Account</i></div>
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

        Your Name : <input type="text" name="name">
        <br><br>
        Your E-mail : <input type="e-mail" name="mail">
        <br><br>
        Your Password : <input type="Password" name="psw">
        <br><br>

















        <br><br>
        <input type="submit" name="submitAccount" class="button4">
    </form>

</div>

<br>
<br>
<div id="footer">
    <div id="footText">Connexion</div>
</div>



</body>

</html>