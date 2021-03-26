<?php session_start(); ?>

<!--Create account part ----------------------------------->
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
            $statement = $mysqli->prepare("INSERT INTO user (`name`, `email`,`password`,  `seller`, `admin`) VALUES (?,?,?, 1, 0);");
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
                "seller" => $row["admin"],
                "admin" => $row["admin"]
            ];

            header('Location:home-buyer.php');

            $mysqli->close();
            header('Location:home-buyer.php');
        }


    }

}
?>
<!----------------------------------->


<!--Connect account part with cookie ----------------------------------->
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

        echo "number of row    " . $result->num_rows;
        $row = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            // output data of each row


            $_SESSION['user'] = [
                "iduser" => $row["iduser"],
                "name" => $row["name"],
                "email" => $row["email"],
                "psw" => $row["password"],
                "seller" => $row["admin"],
                "admin" => $row["admin"]
            ];

            if ($_SESSION['user']['admin'] == "1") {
                header('Location:home-admin.php');
            } elseif ($_SESSION['user']['seller'] == "1") {
                header('Location:home-seller.php');
            } else {
                header('Location:home-buyer.php');
            }


        }
        if ($result->num_rows == 0) {
            setcookie("errorConnection", 1, time() + 3600);
            header('Location:connexion.php');
        }

        $mysqli->close();
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

                echo "l'id de l'item : " . $row["iditem"] . "<br>";

                $itemRow = array($row["iditem"],
                    $row["name"],
                    $row["description"],
                    $row["price"]);


                array_push($_SESSION["item"], $itemRow);
                echo count($_SESSION["item"]);

            }

            foreach ($_SESSION['item'] as $itemSelected) {
                print_r($itemSelected[3]);
                echo "<br>";
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


            $_SESSION["user"] = [];


            while ($row = $result->fetch_assoc()) {

                echo "l'id de l'user : " . $row["iduser"] . "<br>";

                $itemRow = array($row["iduser"],
                    $row["name"],
                    $row["email"],
                    $row["password"],
                    $row["seller"],
                    $row["admin"]);


                array_push($_SESSION["user"], $itemRow);
                echo count($_SESSION["user"]);

            }

            foreach ($_SESSION['user'] as $itemSelected) {
                print_r($itemSelected[3]);
                echo "<br>";
            }


        }


        $mysqli->close();
    }
}


?>

























