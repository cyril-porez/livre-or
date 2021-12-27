<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "livreor");
    mysqli_set_charset($connex, 'utf8');
    $userConnect = $_SESSION["users"];
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$userConnect'");
    $infoUser = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    $error_log = "";
    $error = "";
    
    if (!empty($_POST["login"])) {
        $login = $_POST["login"];
        $requete = mysqli_query($connex, "SELECT login FROM utilisateurs WHERE login = '$login'");
        $verifLogin = mysqli_fetch_all($requete);
        if (count($verifLogin) == 0) {
                $update = mysqli_query($connex, "UPDATE utilisateurs SET login = '$login' WHERE login ='$userConnect'");
                $_SESSION["users"] = $login;
                header("refresh: 0");
        }
        else {
            $error_log = "* Ce login existe déjà";
        }
    }
    else if (!empty($_POST["password"])) {
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        if ($password == $confirmPassword) {
            $passHash = password_hash($password, PASSWORD_ARGON2ID);
            $update = mysqli_query($connex, "UPDATE utilisateurs SET password = '$passHash' WHERE login ='$userConnect'");
            header("refresh: 0");
        }

    }
    else if (isset($_POST["login"])) {
        $error_log = "* oublis dans les champs";
    }
    else if (isset($_POST["password"])) {
        $error = "* oublis dans les champs";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/profil.css">
    <link rel="stylesheet" href="style/footer.css">
    <title>Profil</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <h1>MANGA BADASS</h1>
            <ul id="menu">
                <?php
                    if ($_SESSION["users"] == true){                                
                            echo "
                               <li><p id='connex'>Bonjour  " . $_SESSION['users'] ." !</p></li>
                               <li><a href='index.php' class='navig'>Accueil</a></li>
                               <li><a href='profil.php' class='navig'>Profil</a></li>
                               <li><a class='navig' href='commentaire.php'>Commentaire</a></li>
                               <li><a class='navig' href='livre-or.php'>Livre d'Or</a></li>
                               <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>";                           
                       }
                       else if (isset($_SESSION["users"])  == false) {
                            echo "
                            <li><a href='index.php' class='navig'>Accueil</a></li>
                            <li><a href='inscription.php' class='navig'>Inscription</a></li>
                            <li><a href='connexion.php' class='navig'>Connexion</a></li>";
                        }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Modifier son profil:</h2>
        <div id="formu_login">
            <fieldset class="entete">
                <legend>
                    <p class="titre"><b>LOGIN</b></p>
                </legend>
                <form action="profil.php" method="post" id="formLogin">
                    <input type="text" name="login" placeholder="login" class="champs" value=<?php echo $infoUser[0]["login"]; ?>>
                    <input type="submit" name="update_login" value="editer" class="bouton">
                    <?php
                        echo "<p>$error_log</p>";
                    ?>
                </form>
            </fieldset>
        </div>
        <div id="formu_password">
            <fieldset class="entete"> 
                <legend>
                    <p class="titre"><b>PASSWORD</b></p>
                </legend>
                <form action="profil.php" method="post" id="formPassword">            
                    <input type="text" name="password" placeholder="password" class="champs">
                    <input type="text" name="confirmPassword" placeholder="confirmPassword" id="confirmPass" class="champs">
                    <input type="submit" name="update" value="editer" class="bouton">
                    <?php
                        echo "<p>$error</p>";
                    ?>
                </form>
            </fieldset>
        </div>
    </main>
    <footer>
        <div id="blo">
            <a href="https://github.com/cyril-porez/livre-or" id="titre">GITHUB</a>
        </div>
    </footer>
</body>
</html>