<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "livreor");
    mysqli_set_charset($connex, 'utf8');
    $userConnect = $_SESSION["users"];
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$userConnect'");
    $infoUser = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    $error = "";
    
    if (!empty($_POST["login"]) && !empty($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $requete = mysqli_query($connex, "SELECT login FROM utilisateurs WHERE login = '$login'");
        $verifLogin = mysqli_fetch_all($requete);
        if (count($verifLogin) == 0) {
            if ($password == $confirmPassword) {
                $passHash = password_hash($password, PASSWORD_ARGON2ID);
                $update = mysqli_query($connex, "UPDATE utilisateurs SET login = '$login', password = '$passHash' WHERE login ='$userConnect'");
                $_SESSION["users"] = $login;
                header("refresh: 0");
            }
            else 
                $error = "* erreur confirmation mot de passe !";
        }
        else {
            $error = "* Ce login existe déjà";
        }
    }
    else if (isset($_POST["login"]) || isset($_POST["password"])) {
        $error = "* oublis dans les champs";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="profil.php" method="post">
            <input type="text" name="login" placeholder="login" value=<?php echo $infoUser[0]["login"]; ?>>
            <input type="text" name="password" placeholder="password" value= <?php echo $infoUser[0]["password"]; ?>>
            <input type="text" name="confirmPassword" placeholder="confirmPassword" >
            <input type="submit" name="update" value="editer">
            <?php
                echo "<p>$error</p>";
            ?>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>