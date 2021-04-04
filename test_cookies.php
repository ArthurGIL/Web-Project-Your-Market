<?php session_start(); ?>

<!--Create account part -->
<?php


if (array_key_exists('submitAccount', $_POST)) {


    $name = $_POST ["name"];
    $mail = $_POST ["mail"];
    $psw = $_POST ["psw"];

    if ($name == "" || $mail == "" || $psw == "") {
        header('Location:crAccount.php');
        exit;

    }


    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);

    } else {


        $statement = $mysqli->prepare("SELECT email from user where email = ?;");
        $statement->bind_param("s", $mail);
        $statement->execute();

        $result = $statement->get_result();


        if ($result->num_rows != 0) {
            // output data of each row
            setcookie("error", 1, time() + 3600);
            header('Location:connexion.php');


        } else {
            $statement = $mysqli->prepare("INSERT INTO user (`name`, `email`,`password`,  `seller`, `admin`) VALUES (?,?,?, 0, 0);");
            $statement->bind_param("sss", $name, $mail, $psw);
            $statement->execute();

            $statement = $mysqli->prepare("Select * from user where name = ? and email = ? and password = ?;");
            $statement->bind_param("sss", $name, $mail, $psw);
            $statement->execute();

            $result = $statement->get_result();

            $row = $result->fetch_assoc();
            $_SESSION['user'] = [
                "iduser" => $row["iduser"],
                "name" => $row["name"],
                "email" => $row["email"],
                "psw" => $row["password"],
                "seller" => $row["seller"],
                "admin" => $row["admin"]
            ];

            header('Location:payment.php');

            $mysqli->close();

        }


    }

}
?>



<!--Connect account part with cookie -->
<?php


if (array_key_exists('Connect', $_POST)) {

    echo "test";
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


        $row = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            // output data of each row


            $_SESSION['user'] = [
                "iduser" => $row["iduser"],
                "name" => $row["name"],
                "email" => $row["email"],
                "psw" => $row["password"],
                "seller" => $row["seller"],
                "admin" => $row["admin"]
            ];


        }
        if ($result->num_rows == 0) {
            setcookie("errorConnection", 1, time() + 3600);
            header('Location:connexion.php');
        }
        $mysqli->close();


        $mysqliPayment = new mysqli('127.0.0.1', $user, $password, $database, $port);

        $statementPayment = $mysqliPayment->prepare("Select * from payment where idUserPayment = ?;");
        $statementPayment->bind_param("i", $row["iduser"]);
        $statementPayment->execute();

        $resultPayment = $statementPayment->get_result();

        if ($rowPayment = $resultPayment->fetch_assoc() == 0) {
            header('Location:payment.php');
        } else {
            if ($_SESSION['user']['admin'] == "1") {
                header('Location:home-admin.php');
            } elseif ($_SESSION['user']['seller'] == "1") {
                header('Location:home-seller.php');
            } else {
                header('Location:home-buyer.php');
            }
        }


        $mysqliPayment->close();
    }
}
?>


<!--Deconnexion part-->
<?php

if (isset($_GET["deco"])) {
    $deco = intval($_GET["deco"]);
    if ($deco == 1) {
        $_SESSION["user"] = [];
    }
    header("Location:home.php");
}
?>


<!--Delete item from admin or Seller-->

<?php
if (isset($_GET["itemID"])) {
    $idItem = intval($_GET["itemID"]);
    deleteItem($idItem);
}


function deleteItem($idItemChoosen)
{


    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Delete from item where iditem = ? ;");
        $statement->bind_param("i", $idItemChoosen);
        $statement->execute();
        $_SESSION["item"] = [];


        if ($_SESSION["user"]["admin"] == 1) {
            header('Location:home-admin.php');
        } else {

            switch ($_SESSION["user"]["seller"]) {
                case 1 :
                    header('Location:home-seller.php');
                    break;
                case 0 :
                    header('Location:home-buyer.php');
                    break;
                default :

                    break;

            }
        }

    }
}

?>



<!--Delete user from admin-->
<?php

if (isset($_GET["UserId"])) {
    $UserId = intval($_GET["UserId"]);
    deleteUser($UserId);
}
function deleteUser($User)
{


    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Delete from user where iduser = ? ;");
        $statement->bind_param("i", $User);
        $statement->execute();



        header('Location:admin.php');


    }
}

?>

<?php




function getAllItems()
{
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Select * from item ;");

        $statement->execute();

        $result = $statement->get_result();


        if ($result->num_rows > 0) {
            // output data of each row


            $_SESSION["item"] = [];


            while ($row = $result->fetch_assoc()) {


                $itemRow = array($row["iditem"],
                    $row["name"],
                    $row["description"],
                    $row["price"],
                    $row["idUserSeller"],
                    $row["photo"]);


                array_push($_SESSION["item"], $itemRow);


            }


        }


        $mysqli->close();
    }
}

function getAllUsers()
{
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Select * from user ;");

        $statement->execute();

        $result = $statement->get_result();


        if ($result->num_rows > 0) {
            // output data of each row


            $_SESSION["allUser"] = [];


            while ($row = $result->fetch_assoc()) {


                $itemRow = array($row["iduser"],
                    $row["name"],
                    $row["email"],
                    $row["password"],
                    $row["seller"],
                    $row["admin"]);


                array_push($_SESSION["allUser"], $itemRow);


            }


        }


        $mysqli->close();
    }
}


function getCarItems()
{
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Select * from item where type = 'car';");
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            // output data of each row

            $_SESSION["item"] = [];

            while ($row = $result->fetch_assoc()) {

                $itemRow = array($row["iditem"],
                    $row["name"],
                    $row["description"],
                    $row["price"],
                    $row["idUserSeller"],
                    $row["photo"],
                    $row["typeSell"],
                    $row["sold"]);

                if ($row["sold"] == 0){
                    array_push($_SESSION["item"], $itemRow);
                }


            }
        } else {
            $_SESSION["item"] = [];
        }
        $mysqli->close();
    }
}

function getClothItems()
{
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Select * from item where Type = 'clothes';");
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            // output data of each row

            $_SESSION["item"] = [];

            while ($row = $result->fetch_assoc()) {

                $itemRow = array($row["iditem"],
                    $row["name"],
                    $row["description"],
                    $row["price"],
                    $row["idUserSeller"],
                    $row["photo"],
                    $row["typeSell"],
                    $row["sold"]);

                if ($row["sold"] == 0){
                    array_push($_SESSION["item"], $itemRow);
                }


            }
        } else {
            $_SESSION["item"] = [];
        }
        $mysqli->close();
    }
}









/*Selling item for your account*/
function getSellingItems()
{
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';
    $idUserConnected = $_SESSION["user"]["iduser"];

    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Select * from item where idUserSeller = $idUserConnected;");
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            // output data of each row

            $_SESSION["item"] = [];


            while ($row = $result->fetch_assoc()) {

                $itemRow = array($row["iditem"],
                    $row["name"],
                    $row["description"],
                    $row["price"],
                    $row["idUserSeller"],
                    $row["photo"],
                    $row["typeSell"],
                    $row["sold"]);

                if ($row["sold"] == 0){
                    array_push($_SESSION["item"], $itemRow);
                }


            }


        } else {
            $_SESSION["item"] = [];
        }
        $mysqli->close();
    }
}


function getSellingItemsSold()
{
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';
    $idUserConnected = $_SESSION["user"]["iduser"];

    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Select * from item where idUserSeller = $idUserConnected;");
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            // output data of each row

            $_SESSION["item"] = [];


            while ($row = $result->fetch_assoc()) {

                $itemRow = array($row["iditem"],
                    $row["name"],
                    $row["description"],
                    $row["price"],
                    $row["idUserSeller"],
                    $row["photo"],
                    $row["typeSell"],
                    $row["sold"]);

                if ($row["sold"] == 1){
                    array_push($_SESSION["item"], $itemRow);
                }


            }
        } else {
            $_SESSION["item"] = [];
        }
        $mysqli->close();
    }
}

function getAuctionSeller()
{
    var_dump($_SESSION["user"]);
    $idUserConnected = $_SESSION["user"]["iduser"];
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root

    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

    $statement = $mysqli->prepare("SELECT  distinct user.name as username ,  auction.auction_price, item.*
FROM user
INNER JOIN item
inner join auction
ON  auction.idSeller = item.idUserSeller  and auction.idBuyer = user.iduser and item.idUserSeller = ?;");

    $statement->bind_param("i", $idUserConnected);
    $statement->execute();
    $result = $statement->get_result();


    if ($result->num_rows > 0) {
        // output data of each row

        $_SESSION["itemAuction"] = [];

        while ($row = $result->fetch_assoc()) {

            $itemAuction = array($row["username"],
                $row["auction_price"],
                $row["description"],
                $row["price"],
                $row["type"]);

            array_push($_SESSION["itemAuction"], $itemAuction);
        }


    } else {
        $_SESSION["itemAuction"] = [];
    }
    $mysqli->close();
}


function getAuctionBuyer()
{
    $idUserConnected = $_SESSION["user"]["iduser"];
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root

    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

    $statement = $mysqli->prepare("SELECT  distinct user.name ,  auction.auction_price, item.*
FROM user 
INNER JOIN item 
inner join auction 
ON  auction.idSeller = item.idUserSeller  and auction.idSeller = user.iduser and auction.idBuyer = ?;");

    $statement->bind_param("i", $idUserConnected);
    $statement->execute();
    $result = $statement->get_result();


    if ($result->num_rows > 0) {
        // output data of each row

        $_SESSION["itemAuction"] = [];

        while ($row = $result->fetch_assoc()) {

            $itemAuction = array($row["name"],
                $row["auction_price"],
                $row["description"],
                $row["price"],
                $row["type"]);

            array_push($_SESSION["itemAuction"], $itemAuction);
        }


    } else {
        $_SESSION["itemAuction"] = [];
    }
    $mysqli->close();
}

?>


<!--Become seller-->
<?php
if (isset($_GET["beSeller"])) {
    $seller = intval($_GET["beSeller"]);
    if ($seller == 1) {
        becomeSeller();
    }
    header("Location:home-seller.php");
}


function becomeSeller()
{

    $idUserConnected = $_SESSION["user"]["iduser"];
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root

    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

    $statement = $mysqli->prepare("UPDATE `db_test`.`user` SET `seller` = '1' WHERE (`iduser` = ?);");

    $statement->bind_param("i", $idUserConnected);
    $statement->execute();
}
?>


<?php /*foreach ($_SESSION['itemAuction'] as $itemSelected) : */ ?><!--

    <div id="containerInfo" style="background: palegoldenrod">
        <b>User id : </b><? /*= $itemSelected[0] */ ?>
        <br>
        <b>Name : </b><? /*= $itemSelected[1] */ ?>
        <br>
        <b>Email : </b><? /*= $itemSelected[2] */ ?>
        <br>
        <b>Password : </b><? /*= $itemSelected[3] */ ?>
        <br>
        <b>Seller : </b><? /*= $itemSelected[4] */ ?>


    </div>

--><?php /*endforeach; */ ?>

<!--Contact message -->
<?php

if (isset($_GET["contact"])) {
    contactQuery();
}

function contactQuery()
{
    $name = $_POST ["userId"];
    $mail = $_POST ["email"];
    $object = $_POST ["object"];
    $message = $_POST ["Comments"];


    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);

    } else {

        $statement = $mysqli->prepare("INSERT INTO contact (`user_name`, `email`,`object`,  `message`) VALUES (?,?,?, ?);");
        $statement->bind_param("ssss", $name, $mail, $object, $message);
        $statement->execute();

        switch ($_GET["contact"]) {
            case "admin":
                header("Location:home-admin.php");
                break;
            case "buyer":
                header("Location:home-buyer.php");
                break;
            case "seller":
                header("Location:home-seller.php");
                break;
            case "home":
                header("Location:home.php");
                break;
            default:
                break;
        }


        $mysqli->close();


    }
}


?>


<!--Add to cart part -->
<?php

if (isset($_GET["idItemCart"]) && isset($_GET["idUserCart"])) {
    addToCart();
}

function addToCart()
{
    $iditemCart = $_GET["idItemCart"];
    $idUserCart = $_GET["idUserCart"];
    $idUserSeller = $_GET["idUserSeller"];

    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

    if ($_SESSION['user']['iduser'] == $idUserSeller) {
        if ($_SESSION["user"]["admin"] == 1) {
            header('Location:home-admin.php?errorCart=1');
        } else {

            switch ($_SESSION["user"]["seller"]) {
                case 1 :
                    header('Location:home-seller.php?errorCart=1');
                    break;
                case 0 :
                    header('Location:home-buyer.php?errorCart=1');
                    break;
                default :

                    break;

            }
        }
        exit();

    }


    $statement = $mysqli->prepare("SELECT * from cart where idItemCart = ? and idUserBuyerCart = ? ;");
    $statement->bind_param("ii", $iditemCart, $idUserCart);
    $statement->execute();


    $result = $statement->get_result();


    if ($result->num_rows != 0) {

        if ($_SESSION["user"]["admin"] == 1) {
            header('Location:home-admin.php?errorCart=2');
        } else {

            switch ($_SESSION["user"]["seller"]) {
                case 1 :
                    header('Location:home-seller.php?errorCart=2');
                    break;
                case 0 :
                    header('Location:home-buyer.php?errorCart=2');
                    break;
                default :

                    break;

            }
        }

    } else {
        $statement = $mysqli->prepare("INSERT INTO cart (`iditemCart`, `idUserBuyerCart`) VALUES (?,?);");
        $statement->bind_param("ii", $iditemCart, $idUserCart);
        $statement->execute();
        $mysqli->close();

        if ($_SESSION["user"]["admin"] == 1) {
            header('Location:home-admin.php?errorCart=0');
        } else {

            switch ($_SESSION["user"]["seller"]) {
                case 1 :
                    header('Location:home-seller.php?errorCart=0');
                    break;
                case 0 :
                    header('Location:home-buyer.php?errorCart=0');
                    break;
                default :

                    break;

            }
        }
    }


}


?>


<!--show cart part -->

<?php

function getItemCartUser()
{
    $idUser = $_SESSION['user']['iduser'];


    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

    $statement = $mysqli->prepare("SELECT  distinct *
FROM item
INNER JOIN cart
ON  cart.iditemCart = item.iditem  and cart.idUserBuyerCart = ?;
");
    $statement->bind_param("i", $idUser);
    $statement->execute();
    $result = $statement->get_result();


    $_SESSION["itemCart"] = [];
    $_SESSION['totalPrice'] = [0];
    $totalPrice = 0;

    if ($result->num_rows > 0) {
        // output data of each row

        $_SESSION["itemCart"] = [];

        while ($row = $result->fetch_assoc()) {


            $totalPrice += $row["price"];

            $itemRow = array($row["iditem"],
                $row["name"],
                $row["description"],
                $row["price"],
                $row["type"],
                $row["photo"]);

            array_push($_SESSION["itemCart"], $itemRow);
        }
        $_SESSION['totalPrice'] = [$totalPrice];
    } else {
        $_SESSION["item"] = [];
    }
    $mysqli->close();

}


?>


<!--delete item from cart -->
<?php

if (isset($_GET['idItemCartDelete'])) {
    deleteItemCart();
}


function deleteItemCart()
{
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Delete from cart where iditemCart = ? ;");
        $statement->bind_param("i", $_GET['idItemCartDelete']);
        $statement->execute();
        $_SESSION["itemCart"] = [];


        if ($_SESSION["user"]["admin"] == 1) {
            header('Location:cart-admin.php');
        } else {

            switch ($_SESSION["user"]["seller"]) {
                case 1 :
                    header('Location:cart-seller.php');
                    break;
                case 0 :
                    header('Location:cart-buyer.php');
                    break;
                default :

                    break;

            }
        }

    }
}

?>


<!-- more details function -->

<?php ?>

<?php


function getItemDetails($idItem)
{

    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("Select * from item where idItem = ?;");
        $statement->bind_param("i", $idItem);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            // output data of each row

            $_SESSION["itemDetail"] = [];

            while ($row = $result->fetch_assoc()) {


                $_SESSION["itemDetail"] = [$row["iditem"],
                    $row["name"],
                    $row["description"],
                    $row["price"],
                    $row["idUserSeller"],
                    $row["photo"],
                    $row["typeSell"]];

            }
        } else {
            $_SESSION["item"] = [];
        }
        $mysqli->close();
    }
}

?>

<!-- add Item -->


<?php

if (isset($_GET["uploadImage"])) {
    addItem($_GET["uploadImage"]);
}


function addItem($idUser)
{
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "db_test";

    $itemName = $_POST["itemName"];
    $description = $_POST["Description"];
    $price = $_POST["priceItem"];
    if (isset($_POST["auction"])) {
        $typeSell = $_POST["auction"];
    }
    if (isset($_POST["instant"])) {
        $typeSell = $_POST["instant"];
    }
    if (isset($_POST["bestOffer"])) {
        $typeSell = $_POST["bestOffer"];
    }

    if (isset($_GET["category"])) {
        if ($_GET["category"] == 1) {
            $category = "car";
        } else {
            $category = "clothes";
        }
    }


// Create database connection
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

// If file upload form is submitted
    $status = $statusMsg = '';
    if (isset($_POST["submit"])) {
        $status = 'error';
        if (!empty($_FILES["image"]["name"])) {
            // Get file info
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'PNG');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                // Insert image content into database
                $insert = $db->query("INSERT into item (name, description,price, photo, idUserSeller, type, typeSell, sold) 
                                                VALUES ('$itemName', '$description', '$price','$imgContent','$idUser','$category', '$typeSell', 0)");

                if ($insert) {
                    $status = 'success';
                    $statusMsg = "File uploaded successfully.";

                    if ($_SESSION["user"]["admin"] == 1) {
                        header('Location:home-admin.php?addSuccess=1');
                    } else {
                        header('Location:home-seller.php?addSuccess=1');

                    }


                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        } else {
            $statusMsg = 'Please select an image file to upload.';
        }
    }

// Display status message
    echo $statusMsg;
}

?>

<!--add payment -->

<?php

if (array_key_exists('submitPayment', $_POST)) {

    addPaymentUser($_SESSION["user"]["iduser"]);

}


function addPaymentUser($idUserPayment)
{


    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $cardType = $_POST['cardType'];
    $cardNumber = $_POST['cardNumber'];
    $nameOnCard = $_POST['cardName'];
    $date = $_POST['cardDate'];
    $code = $_POST['securityCode'];


    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'db_test'; //To be completed to connect to a database. The database must exist.
    $port = NULL; //Default must be NULL to use default port
    $database = 'db_test';


    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);


    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    } else {

        $statement = $mysqli->prepare("insert into payment (idUserPayment,
                     address1, 
                     address2, 
                     city,
                     postalCode,
                     country,
                     phoneNumber,
                     typeCard,
                     cardNumber,
                     nameCard,
                     expDate,
                     digiCode
                     ) values ('$idUserPayment', ?,?,?,?,?,?,?,?,?,'$date',?);");
        $statement->bind_param("sssssisisi",
            $address1,
            $address2,
            $city,
            $postalCode,
            $country,
            $phone,
            $cardType,
            $cardNumber,
            $nameOnCard,
            $code);
        $statement->execute();

        if ($_SESSION["user"]["seller"] == 1) {
            header('Location:home-seller.php');
        } else {
            header('Location:home-buyer.php');

        }

    }

}

?>













