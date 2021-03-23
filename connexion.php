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

  <?php //PHP Code
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
  ?>

</body>
</html> 
 