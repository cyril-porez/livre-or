<?php
    session_start();
    require('bdd.php');
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
                     if (isset($_SESSION["users"]) == true) {    
                        echo "<li><p id='connex'>Bonjour  " . $_SESSION['users'] ." !</p></li>";?>                       
                        <li><a href='index.php' class='navig'>Accueil</a></li>
                        <li><a href='profil.php' class='navig'>Profil</a></li>
                        <li><a class='navig' href='commentaire.php'>Commentaire</a></li>
                        <li><a class='navig' href='livre-or.php'>Livre d'Or</a></li>
                        <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>
                        <?php                           
                    }
                    else {?>
                        <li><a href='index.php' class='navig'>Accueil</a></li>
                        <li><a class='navig' href='livre-or.php'>Livre d'Or</a></li>
                        <li><a href='inscription.php' class='navig'>Inscription</a></li>
                        <li><a href='connexion.php' class='navig'>Connexion</a></li>
                    <?php
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h2>LIVRE D'OR:</h2>
        <div>
            <?php            
                foreach ($infos as $info) { ?>    
                    <div id="container">
                        <div id="info">
                            <div class="info_msg">
                                <?php 
                                    $date = date_create($info['date']);
                                    echo "Posté le :" . " " . date_format($date, "d-M-Y  à H:i:s" ); 
                                ?>
                            </div>
                            <div class="info_msg">
                                <?php
                                    echo "Posté par :" . " " . $info['login'];
                                ?>
                            </div>                                   
                        </div>
                        <div id="msg">                            
                            <?php echo $info['commentaire'] ?>                       
                        </div>                      
                    </div> <?php
                } 
            ?>
        </div>
            <?php 
                if (isset($_SESSION["users"])) {?>
                    <p id="p_lien">Si vous voulez poster un commentaire cliquez sur le lien suivant <a id="com" href="commentaire.php">commentaire</a></p>
                <?php
            }
        ?>
    </main>
    <footer>
        <div id="blo">
            <?php
                if (isset($_SESSION["users"]) == true) {?>                         
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
                    <a class='lien' href='index.php'>ACCUEIL</a>
                    <a class='lien' href='livre-or.php'>LIVRE D'OR</a>
                    <a class='lien' href='inscription.php'>INSCRIPTION</a>
                    <a class='lien' href='connexion.php'>CONNEXION</a>
                    <?php
                }
            ?>                               
        </div>
    </footer>
</body>
</html>