<?php
    $connex = mysqli_connect("localhost", "root", "", "livreor");
    mysqli_set_charset($connex, 'utf8'); 
    session_start();


    $user = $_SESSION["users"];
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$user'");
    $infoUser = mysqli_fetch_all($requete);
    // intval permet de transformer la string comprise dans le tableau de l'index id en entier.
    $idUser = intval($infoUser[0][0], $base = 10);
    if (isset($_GET["commentaire"])) {
        $commentaires = $_GET["commentaire"];
        $postCommentaire = mysqli_query($connex, "INSERT into commentaires (commentaire, id_utilisateur, `date`) values ('$commentaires', '$idUser', NOW())");
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
        <h2>Poster votre commentaire ici :</h2>
        <div id="formu">
            <form action="" method="get" id="commentaire">
                <textarea name="commentaire" id="comment" cols="60" rows="10"></textarea>
                <button name="commentButon" id="com" >Commenter</button>
            </form>
        </div>
    </main>
    <footer>
        <div id="blo">
            <a id="lien" href="https://github.com/cyril-porez/livre-or">GITHUB</a>
        </div>
    </footer>
</body>
</html>