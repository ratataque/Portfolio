<?php
session_start();
// include_once '../../db/connection_sql.php';
// include_once '../../db/table.php';

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}
?>


<!DOCTYPE HTML>
<html>

<head>
    <title> panneau d'administration </title>

    <!-- css necessaire pour Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/5.1.2/css/bootstrap.min.css">

    <!--  Mon css perso pour inclure les polices de caracteres-->
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/formulaire.css">

    <!-- scripts necessaires pour bootstrap -->
    <script src="../bootstrap/5.1.2/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery needed -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="../js/admin_script.js"></script>
</head>

<body>

    <nav class="nav affix">
        <div class="container">
            <div class="logo">
                <a href="/gestion/administration.php?content=accueil">Accueil</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks clients">
                    <li><a class="titre" id="classe" href="/gestion/administration.php?content=gestion_miel">Gestion</a></li>
                    <li><a class="titre" id="facture" href="/gestion/administration.php?content=creation_classe">Classe</a></li>
                    <li><a class="titre" id="ajout_apiculteur" href="/gestion/administration.php?content=ajout_apiculteur">Ajout Apiculteur</a></li>
                    <li><a class="titre" id="ajout_miel" href="/gestion/administration.php?content=ajout_miel">Ajout Miel</a></li>
                    <li><a class="titre" id="deconnexion" href="/index.php?do=deconnexion">Deconnexion</a></li>
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>



    <div id="content">

        <?php

        if (isset($_GET["content"])) {

            include $_GET["content"] . ".php";
        } else {
            include "accueil.php";
        }
        ?>

    </div>
</body>

</html>