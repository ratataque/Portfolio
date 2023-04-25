<?php
session_start();
$page = !isset($_GET["page"])?"":$_GET["page"];
$page = htmlspecialchars($page);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/formation.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/script.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.1.0/anime.min.js"></script>

    <title>Rimmely Ewan</title>
</head>

<body class=<?php echo "'$page'" ?>>
    <a class="vers_about button" href="/?page=about" onclick="transi(event, 'about');">About</a>
    <a class="vers_projet button" href="/?page=projet" onclick="transi(event, 'projet');">Projets</a>

    <div class="moi">
        <div class="nom">RIMMELY</div>
        <div class="prenom">Ewan</div>
    </div>

    <img class="tortue <?php echo "$page" ?>" alt="tortue" src="./images/tortue_petite-removebg-preview.png"/>

    <img class="fleche" alt="fleche" src="./images/infini.png" onclick="vers_linfini()"/>

    <a class="vers_formation button" href="/?page=formation" onclick="transi(event, 'formation');">Formation</a>
    <a class="vers_veille button" href="/?page=veille" onclick="transi(event, 'veille');">Veille Technologique</a>


    <?php include_once("about.php") ?>

    <a id="projet" class="titre_projet">Projets</a>
    <a class="projet_acceuil button" href="/" onclick="transi(event, 'acceuil');">Acceuil</a>

    <?php include_once("formation.php") ?>

    <a id="veille" class="titre_veille">Veille Technologique</a>
    <a class="veille_acceuil button" href="/" onclick="transi(event, 'acceuil');">Acceuil</a>
</body>

</html>