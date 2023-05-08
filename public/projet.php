<?php if(!defined('INDEX_LOADED') || INDEX_LOADED != 1) header('Location: index.php'); ?>

<div class="projet_cont">
    <a id="projet" class="titre_projet">Projets</a>
    <a class="projet_acceuil button" href="/" onclick="transi(event, 'acceuil');">Acceuil</a>


    <div class="cards_cont">
        <div class="card">
            <div class="content">
                <img src="./images/fraise_logo.png"/>
                <img class="image" src="./images/fraise_disp.png"/>
                <div class="gris">Gestionnaire de mot de passe en lignes axé sur la sécurité</div>
                <a class="voir_plus" href="https://github.com/ratataque/fraise" target="_blank">Voir plus</a>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <img class="bee" src="./images/bee_icon.png"/> Le miel et les abeilles
                <br>
                <br>
                <img class="image" src="./images/miel.png"/>
                <div class="gris">Site vitrine pour la vente de miel en duo avec l'application mobile</div>
                <a class="voir_plus" href="https://github.com/ratataque/Le_miel_et_les_abeilles" target="_blank">Voir plus</a>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <img class="bee" src="./images/bee_icon.png"/> Appli miel
                <br>
                <br>
                <div class="tel_cont">
                    <img class="tel" src="./images/app_miel.png"/>
                    Application mobile qui vas de pair avec le site vitrine pour la vente de miel
                </div>
                <a class="voir_plus" href="https://github.com/ratataque/App_miel" target="_blank">Voir plus</a>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <img class="bee" src="./images/advent_titre-removebg-preview.png"/>
                <img class="image" src="./images/advent.png"/>
                <div class="gris">Solution au 25 probleme realiser en python</div>
                <a class="voir_plus" href="https://github.com/ratataque/advent_of_code" target="_blank">Voir plus</a>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <img class="vroom" src="./images/Vroooom.png"/>
                <img class="image" src="./images/vroom.png"/>
                <div class="gris">Simulation d'entreprise prettant de l'argent pour louer des voitures en liesing</div>
                <a class="voir_plus" href="https://github.com/estrakio/Projet-Vroom" target="_blank">Voir plus</a>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <img class="vroom" src="./images/Vroooom.png"/>
                <div class="tel_cont">
                    <img class="tel" src="./images/app_vroom.png"/>
                    Application mobile qui vas gérer la partie expertise des voiture lors de leurs retour
                </div>
                <a class="voir_plus" href="https://github.com/estrakio/app-Vroooom" target="_blank">Voir plus</a>
            </div>
        </div>
    </div>



    <div class="cards_cont_decale">
        <div class="card">
            <div class="content">
                💻  Ma config linux   
                <br>
                <br>
                <img class="image" src="./images/dotfiles.png"/>
                <div class="gris">Fichier de configuration pour mon linux</div>
                <a class="voir_plus" href="https://github.com/ratataque/dotfiles" target="_blank">Voir plus</a>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <img class="bee" src="./images/demineur.png"/> Demineur
                <br>
                <br>
                <img class="image" src="./images/demineur_game.png"/>
                Jeu demineur en C#
                <a class="voir_plus" href="https://github.com/ratataque/Demineur" target="_blank">Voir plus</a>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <img class="bee" src="./images/sudoku.png"/> Sudoku
                <div class="tel_cont">
                    <img class="tel" src="./images/app_vroom.png"/>
                    Jeu mobile sudoku en java
                </div>
                <a class="voir_plus" href="https://github.com/ratataque/Sudoku" target="_blank">Voir plus</a>
            </div>
        </div>
    </div>

    <div class="round" onclick="projet_next_page(this)">
        <div id="cta">
            <span class="arrow primera next "></span>
            <span class="arrow segunda next "></span>
        </div>
    </div>
</div>
