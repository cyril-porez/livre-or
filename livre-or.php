<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "livreor");
    mysqli_set_charset($connex, 'utf8');
    $requete = mysqli_query($connex, "SELECT utilisateurs.login , commentaires.commentaire, commentaires.date  FROM utilisateurs inner join commentaires on utilisateurs.id = commentaires.id_utilisateur ORDER BY date desc");
    $infos = mysqli_fetch_all($requete, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/livre-or.css">
    <link rel="stylesheet" href="style/footer.css">
    <title>Livre d'or</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <h1>MANGA BADASS</h1>
            <ul id="menu">
                <?php
                    if ($_SESSION["users"] == true) {                                
                            echo "
                               <li><p id='connex'>Bonjour  " . $_SESSION['users'] ." !</p></li>
                               <li><a href='index.php' class='navig'>Accueil</a></li>
                               <li><a href='profil.php' class='navig'>Profil</a></li>
                               <li><a class='navig' href='commentaire.php'>Commentaire</a></li>
                               <li><a class='navig' href='livre-or.php'>Livre d'Or</a></li>
                               <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>";
                           
                    }
                    if (isset($_SESSION["users"])  == false) {
                        echo "
                            <li><a href='index.php' class='navig'>Accueil</a></li>
                            <li><a href='inscription.php' class='navig'>Inscription</a></li>
                            <li><a href='connexion.php' class='navig'>Connexion</a></li>
                        ";
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h2>LIVRE D'OR:</h2>
        <?php            
            foreach ($infos as $info) { ?>    
                <div id="container">
                    <div id="entête">
                        <fieldset id="com">
                            <legend id="contour">
                                <?php 
                                    $date = date_create($info['date']);
                                    echo "Posté par l'utilisateur:" . " " . $info['login']; 
                                    echo "Posté le :" . " " . date_format($date, "d-M-Y  à H:i:s" ); 
                                ?>
                            </legend>
                            <?php echo $info['commentaire'] ?>
                        </fieldset>
                    </div>                      
                </div> <?php
            }           
        ?>
    </main>
    <footer>
        <div id="blo">
            <a id="lien" href="https://github.com/cyril-porez/livre-or">GITHUB</a>                    
        </div>

    </footer>
</body>
</html>