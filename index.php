<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/footer.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <h1>MANGA BADASS</h1>
            <ul id="menu">
                <?php 
                    if (isset($_SESSION["users"])){
                        if ($_SESSION["users"] == true){
                                
                                 echo "
                                    <li><p id='connex'>Bonjour  " . $_SESSION['users'] ." !</p></li>
                                    <li><a href='index.php' class='navig'>Accueil</a></li>
                                    <li><a href='profil.php' class='navig'>Profil</a></li>
                                    <li><a class='navig' href='commentaire.php'>Commentaire</a></li>
                                    <li><a class='navig' href='livre-or.php'>Livre d'Or</a></li>
                                    <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>";
                                
                            }
                        }
                        if (isset($_SESSION["users"])  == false) {
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
        <div id="accroche">
            <p id="text">Bienvenue sur Manga Badass !</br>
            Viens défendre tes mangas préférés avec passions et acharnement!</p>
        </div>
        <div id="container">
            <div class="container1">
                <img class="images" src="images/dbz.jpg" alt="dbz">
                <img class="images" src="images/city_hunter.jpg" alt="city hunter">
                <img class="images" src="images/Saint-Seiya.png" alt="saint seiya">
            </div>
            <div class="container1">
                <img class="images" src="images/tough.jpg" alt="tough">
                <img class="images" src="images/Hajime_no_ippo.jpg" alt="hajime no ippo">
                <img class="images" src="images/baki.jpg" alt="baki">
            </div>
            <div class="container1">
                <img class="images" src="images/gundam.jpg" alt="gundam">
                <img class="images" src="images/hokutonoken.jfif" alt="hokuto no ken">
                <img class="images" src="images/kingdom.jpg" alt="kingdom">
            </div>
        </div>
    </main>
    <footer>
        <div id="blo">
            <a id="lien" href="https://github.com/cyril-porez/livre-or">GITHUB</a>                    
        </div>
    </footer>
</body>
</html>