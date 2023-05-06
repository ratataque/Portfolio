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
    <link rel="stylesheet" href="css/projet.css">
    <link rel="stylesheet" href="css/veille.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/script.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
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

    <?php include_once("projet.php") ?>

    <?php include_once("formation.php") ?>

    <?php include_once("veille.php") ?>

    <script type="text/javascript" src="./js/vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 25,
            speed: 400,
            glare: true,
            "max-glare": 1,
        });
    </script>
</body>

</html>
