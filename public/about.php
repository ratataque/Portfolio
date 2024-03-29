<?php if(!defined('INDEX_LOADED') || INDEX_LOADED != 1) header('Location: index.php'); ?>

<div class="about_cont">
    <a id="about" class="titre_about">About</a>
    <div class="overlay_about">
        <a class="about_acceuil button" href="/?page=acceuil" onclick="transi(event, 'acceuil');">Acceuil</a>
    </div>

    <img alt="pdp" src="./images/pdp.png" class="pdp" />

    <div class="text_cont">
        <div class="titre_moi underline">À propos de moi :</div>
        <div class="p_presentation">
            <span style="color: darkorange;">-</span> Je m'appelle Rimmely Ewan j'ai 21 ans. Je suis actuellement en
            deuxième d'un BTS SIO que j'effectue à Strasbourg.
            <br><span style="color: darkorange;">-</span> J'aimerai poursuivre ma formation vers un diplôme d'ingénieur.
        </div>


        <div class="titre_moi underline">Centres d'interet :</div>
        <div class="p_presentation">
            Toutes les activités que j'apprécie possèdent plusieurs points communs :
            <div class="pre">
                <span style="color: darkorange;">-</span> sont difficile à apprendre au début
                <span style="color: darkorange;">-</span> mais une fois maitrisé le potentiel s'en libère
                <span style="color: darkorange;">-</span> notion de rapidité
            </div>
            Voici quelques activités que j'apprécie qui respectent ces conditions :
            <div class="pre">
                <span style="color: darkorange;">-</span> Sport (Snowboard, Badminton, Parkour, Taekwondo ...)
                <span style="color: darkorange;">-</span> Jeux video (<a href="https://youtu.be/4GDIlrgom5o?t=213" target="_blank">Osu!</a>, <a href="https://youtu.be/GJWdCL-obXU?t=11" target="_blank">Rocket League</a>, <a href="https://youtu.be/inafEuH2Tag?t=12" target="_blank">BDO</a>, <a href="https://youtu.be/NUKZ7gPzfmg?t=21" target="_blank">simulation de drift</a>)
                <span style="color: darkorange;">-</span> <a href="https://youtu.be/M5yjKpMXChI?t=35" target="_blank">Speed cubing</a>
                <span style="color: darkorange;">-</span> Se déplacer/coder avec vim (<a href="https://github.com/ratataque/dotfiles" target="_blank">ma config</a>)
            </div>
        </div>
    </div>
</div>