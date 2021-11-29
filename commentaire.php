<?php
    $connex = mysqli_connect("localhost", "root", "", "livreor");
    mysqli_set_charset($connex, 'utf8'); 
    session_start();


    $user = $_SESSION["users"];
    var_dump($user);
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE login = '$user'");
    $infoUser = mysqli_fetch_all($requete);
    // intval permet de transformer la string comprise dans le tableau de l'index id en entier.
    $idUser = intval($infoUser[0][0], $base = 10);
    echo $idUser;
    var_dump($infoUser);
    if (isset($_GET["commentaire"])) {
        $commentaires = $_GET["commentaire"];
        $postCommentaire = mysqli_query($connex, "INSERT into commentaires (commentaire, id_utilisateur, date) values ('$commentaires', '$idUser', NOW() )");
        var_dump($postCommentaire);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form action="livre-or.php" method="get">
            <textarea name="commentaire" id="comment" cols="60" rows="10"></textarea>
            <button name="commentButon" id="com" >Commenter</button>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>