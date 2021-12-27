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
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <ul id="menu">
                <li><a href='index.php' class='navig'>Accueil</a></li>
                <li><a href='inscription.php' class='navig'>Inscription</a></li>
                <li><a href='connexion.php' class='navig'>Connexion</a></li> 
            </ul>
        </nav>
    </header>
    <main>
        <div id="formu">
            <form action="connexion.php" method="post" id="formulaire">
                <input type="text" name="login" class="champs" placeholder="login">
                <input type="text" name="password" class="champs" placeholder="password">
                <input type="submit" name="connect" id="bouton" value="connecter">
                <?php
                    echo "<p>$error</p>";
                ?>
            </form>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>