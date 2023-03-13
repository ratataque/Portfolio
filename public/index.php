<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/script.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.1.0/anime.min.js"></script>

    <title>Le Miel et les abeilles</title>
</head>

<body>
    <a class="vers_about" href="#" onclick="transi('about');">About</a>
    <a class="vers_projet" href="#" onclick="transi('projet');">Projet</a>

    <div class="moi">
        <div class="nom">RIMMELY</div>
        <div class="prenom">Ewan</div>
    </div>

    <a class="vers_centre_interet" href="#" onclick="transi('centre_interet');">Centre D'interet</a>
    <a class="vers_veille" href="#" onclick="transi('veille');">Veille Technologique</a>


    <a id="about" class="titre_about">About</a>
    <a class="about_acceuil" href="#" onclick="transi('acceuil');">Acceuil</a>

    <a id="projet" class="titre_projet">Projet</a>
    <a class="projet_acceuil" href="#" onclick="transi('acceuil');">Acceuil</a>

    <a id="centre_interet" class="titre_centre_interet">Centre D'interet</a>
    <a class="centre_acceuil" href="#" onclick="transi('acceuil');">Acceuil</a>

    <a id="veille" class="titre_veille">Veille Technologique</a>
    <a class="veille_acceuil" href="#" onclick="transi('acceuil');">Acceuil</a>
</body>

</html>