<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "livreor");
    mysqli_set_charset($connex, 'utf8');
    $error = "";

    if (!empty($_POST["login"]) && !empty($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $requete = mysqli_query($connex, "SELECT login, password FROM utilisateurs WHERE login = '$login'");
        $users = mysqli_fetch_all($requete, MYSQLI_ASSOC);
        if (count($users) != 0) {
            if (password_verify($password, $users[0]["password"])) {
                $_SESSION["users"] = $login;
                header("Location: index.php");
            }
            else {
                $error = "* Problem de password";
            }
        }
        else {
            $error = " * Ce login n'existe pas";
        }
    }
    else if (isset($_POST["login"]) && isset($_POST["password"]))
        $error = "oublis champs";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="connexion.php" method="post">
            <input type="text" name="login" placeholder="login">
            <input type="text" name="password" placeholder="password">
            <input type="submit" name="connect" value="connecter">
            <?php
                echo "<p>$error</p>";
            ?>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>