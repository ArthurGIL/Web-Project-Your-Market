<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Your Market - Connexion</title>
    <link rel="stylesheet" href="Market.css" type="text/css"/>
</head>

<body>

<div id="title">
    <h1>Your Market</h1>
    <a href="connexion.php" title="Connexion">
        <button class="buttonConnex">Connexion</button>
    </a>
    <a href="cart.php" title="Cart">
        <button class="buttonCart">Cart</button>
    </a>
</div>

<hr>

<div id="nav">
    <a href="home.php" title="Home">
        <button class="buttonBack">< Back</button>
    </a>
</div>

<hr>

<h2>Connect to you account</h2>
<div id="content">
    <form action="connexion.php" method="post">
        <br>
        Your Name : <input type="text" name="name">
        <br><br>
        Your E-mail : <input type="e-mail" name="mail">
        <br><br>
        Your Password : <input type="Password" name="psw">
        <br><br>
        <input type="submit" value="Connect" class="button4">
    </form>

    <div id="right">
        <a href="crAccount.php" title="crAccount">
            <button class="button2">Create an account</button>
        </a>
    </div>
</div>


<?php

$name = $_POST ["name"];
$mail = $_POST ["mail"];
$psw = $_POST ["psw"];

$user = 'root';
$password = ''; //To be completed if you have set a password to root
$database = 'db_test'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
$database = 'db_test';


$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {

    $statement = $mysqli->prepare("Select * from user where name = ? and email = ? and password = ?;");
    $statement->bind_param("sss", $name, $mail, $psw);
    $statement->execute();

    $result = $statement->get_result();

    echo "number of row    " . $result->num_rows;

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        // header('Location:details.html');
        setcookie("name", $row["name"], time() + 3600);
        setcookie("email", $row["email"], time() + 3600);
        setcookie("psw", $row["password"], time() + 3600);

        setcookie("seller", $row["seller"], time() + 3600);
        setcookie("admin", $row["admin"], time() + 3600);


    }

    $mysqli->close();
}
?>


<br>
<div id="footer">
    Connexion
</div>


<div>
    <?php
    echo $_COOKIE["name"];
    echo $_COOKIE["email"];
    echo $_COOKIE["psw"];
    echo $_COOKIE["admin"];

    ?>
</div>
</body>
</html>
<!--header('Location:home.php');-->

