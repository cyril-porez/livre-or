<?php
    require('bdd.php');
    $error = "";

    if (!empty($_POST["login"]) && !empty($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $requete = mysqli_query($connex, "SELECT (login) FROM utilisateurs WHERE login = '$login'");
        $verifLogin = mysqli_fetch_all($requete);
        
        if (count($verifLogin) == 0) {            
            if ($password == $confirmPassword) {
                $passHash = password_hash($password, PASSWORD_ARGON2I);
                
                if (password_verify($password, $passHash)) {
                    $inscription = mysqli_query($connex, "INSERT into utilisateurs (login, password) VALUES ('$login', '$passHash')");
                    header("Location: connexion.php");
                }
            }
            else {
                $error = "* error password";
            }
        }
        else {
            $error =  "* login déja existant";
        }
    }
    else if (isset($_POST["login"]) || isset($_POST["password"]) )
        $error = "* oublis champ";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/inscription.css">
    <link rel="stylesheet" href="style/footer.css">
    <title>Inscription</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <h1>MANGA BADASS</h1>
            <ul id="menu">
                <li><a href='index.php' class='navig'>Accueil</a></li>
                <li><a class='navig' href='livre-or.php'>Livre d'Or</a></li>
                <li><a href='inscription.php' class='navig'>Inscription</a></li>
                <li><a href='connexion.php' class='navig'>Connexion</a></li>           
            </ul>
        </nav>
    </header>
    <main>
        <div id="formu">
            <form action="inscription.php"  method="post" id="formulaire">
                <input type="text" name="login" class="champs" placeholder="login">
                <input type="text" name="password" class="champs" placeholder="password">
                <input type="text" name="confirmPassword" class="champs" placeholder="confirmPassword">
                <input type="submit" name="inscription" id="bouton" value="s'incrire">
                <?php
                    echo "<p>$error</p>";
                ?>
            </form>
        </div>
    </main>
    <footer>
        <div id="blo">
            <a class='lien' href='https://github.com/cyril-porez/livre-or'>GITHUB</a>
            <a class='lien' href='index.php'>ACCUEIL</a>
            <a class='lien' href='inscription.php'>INSCRIPTION</a>
            <a class='lien' href='connexion.php'>CONNEXION</a>                           
        </div>
    </footer>
</body>
</html>