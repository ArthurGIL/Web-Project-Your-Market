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
<?php

if (isset($_COOKIE["error"])){
    print ("<h2>You are already in the database</h2>");
    setcookie("error", 0, time()-3600);
    //header('Location:crAccount.php');
}
if (isset($_COOKIE["errorConnection"])){
    print ("<h2>Wrong email or password, or create an account</h2>");
    setcookie("errorConnection", 0, time()-3600);
    //header('Location:crAccount.php');
}

if (isset($_GET["errorUrl"])){
    print ("<h2>You are not allowed to change the url, or connect</h2>");
    setcookie("errorConnection", 0, time()-3600);
    //header('Location:crAccount.php');
}

?>
<h2>Connect to you account</h2>
<div id="content">
    <form action="test_cookies.php" method="post">
        <br>
        Your Name : <input type="text" name="name" >
        <br><br>
        Your E-mail : <input type="e-mail" name="mail">
        <br><br>
        Your Password : <input type="Password" name="psw" >
        <br><br>
        <input type="submit" name="Connect" value="Connect" class="button4">
    </form>
    <br>
    <div id="right">
        <a href="crAccount.php" title="crAccount">
            <button class="button2">Create an account</button>
        </a>
    </div>
</div>


<?php
/*
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
        session_start();
        $_SESSION['user'] = "user";

    }

    $mysqli->close();
}
*/ ?>


<br>
<div id="footer">
    Connexion
</div>


<div>

</div>
</body>
</html>
<!--header('Location:home.php');-->
<!--
=======
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>Your Market - Connexion</title>
  <link rel="stylesheet" href="Market.css" type="text/css" />
</head>

<body>

<div id="title">
  <h1>Your Market</h1>
</div>
<div id="sub"><i>- Connexion</i></div>
<div id="optButtons">
  <a href="connexion.php" title="Connexion"><button class="buttonConnex">Connexion</button></a>
  <a href="cart.php" title="You must be connected and a seller to have a cart (see 'Connexion')"><button class="buttonCart" disabled>Cart</button></a>
</div>

<hr>

<div id="nav">
  <a href="home.php" title="Home"><button class="buttonBack">< Back</button></a>
</div>

<hr>

<h2>Connect to you account</h2>
<div id="content">
  <form action = "connexion.php" method = "post">
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
    <a href="crAccount.php" title="crAccount"><button class="button2">Create an account</button></a>
  </div>
</div>

<br>
<div id="footer">
  Connexion
</div>

  <?php /*//PHP Code
    if (array_key_exists('Connect', $_POST)) {
      $name = $_POST["name"];
      $mail = $_POST["mail"];
      $psw = $_POST["psw"];

      $database = 'database';
      $port = NULL; //Default must be NULL to use default port
      $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

      if ($mysqli->connect_error) {
        die('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
      }

      if($name || $mail || $psw == ""){
        alert("Missing information");
      }
      else {
        $sql = "SELECT name, mail, password FROM database;";
        $result = $mysqli->query($sql);
        echo "number of row".$result->num_rows;

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            header('Location:home.php');
          }
        } 
        else {
          alert ("No account with these parameters, consider creating an account.");
        }
        $mysqli->close();
      }
    }
  */ ?>

</body>
</html> 
 
>>>>>>> Dissociation NonConnecté/Buyer/Seller/Admin
-->