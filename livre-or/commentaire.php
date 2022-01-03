<?php
    require('bdd.php');
    session_start();
    $msg_error = "";

    $user = $_SESSION["users"];
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$user'");
    $infoUser = mysqli_fetch_all($requete);
    // intval permet de transformer la string comprise dans le tableau de l'index id en entier.
    $idUser = intval($infoUser[0][0], $base = 10);
    if (!empty($_GET["commentaire"])) {
        $commentaires = $_GET["commentaire"];
        $postCommentaire = mysqli_query($connex, "INSERT into commentaires (commentaire, id_utilisateur, `date`) values ('$commentaires', '$idUser', NOW())");
    }
    else if (isset($_GET["commentaire"])) {
        $msg_error = "* Champ commentaire vide"; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/commentaire.css">
    <link rel="stylesheet" href="style/footer.css">
    <title>Commentaire</title>
</head>
<body>
    <header>
    <nav id="navbar">
            <h1>MANGA BADASS</h1>
            <ul id="menu">
                <?php
                    if (isset($_SESSION["users"]) == true) {    
                        echo "<li><p id='connex'>Bonjour  " . $_SESSION['users'] ." !</p></li>";?>                       
                        <li><a href='index.php' class='navig'>Accueil</a></li>
                        <li><a href='profil.php' class='navig'>Profil</a></li>
                        <li><a class='navig' href='commentaire.php'>Commentaire</a></li>
                        <li><a class='navig' href='livre-or.php'>Livre d'Or</a></li>
                        <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>
                        <?php                           
                    }
                    else if (isset($_SESSION["users"])  == false) {
                        header("Location: index.php");
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Poster votre commentaire ici :</h2>
        <div id="formu">
            <form action="" method="get" id="commentaire">
                <textarea name="commentaire" id="comment" cols="60" rows="10"></textarea>
                <button name="commentButon" id="com" >Commenter</button>
                <p><?php echo $msg_error; ?></p>
            </form>
        </div>
    </main>
    <footer>
        <div id="blo">
            <?php
                if ($_SESSION["users"] == true) {?>                         
                    <a class='lien' href='https://github.com/cyril-porez/livre-or'>GITHUB</a>
                    <a class='lien' href='index.php'>ACCUEIL</a>
                    <a class='lien' href='profil.php'>PROFIL</a>
                    <a class='lien' href='commentaire.php'>COMMENTAIRE</a>
                    <a class='lien' href='livre-or.php'>LIVRE D'OR</a>
                    <a class='lien' href='deconnexion.php'>DECONNEXION</a>
                    <?php                           
                }
                else if (isset($_SESSION["users"])  == false) {?>
                    <a class='lien' href='https://github.com/cyril-porez/livre-or'>GITHUB</a>
                    <a class='lien' href='index.php'>Accueil</a>
                    <a class='lien' href='inscription.php'>Inscription</a>
                    <a class='lien' href='connexion.php'>Connexion</a>
                    <?php
                }
            ?>                               
        </div>
    </footer>
</body>
</html>