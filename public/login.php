<?php
// echo ("<pre>");
// var_dump($_SESSION);
// echo "</pre>";
//echo("a = ".$a);

//unset($_SESSION['faux']);
//unset($_SESSION['utilisateur']);
//unset($_SESSION);


?>

<div id="div_formulaire">
    <form action="index.php" method="post" id="connexion_login">
        <h1>Se connecter</h1>

        

        <div id="texte_centrer">
            <p id="<?php if (isset($_POST["email"]) && !$login_valide) {echo "texte_rouge";}else{echo "texte_cacher";} ?>"> Email ou mot de passe incorrect <br><br></p>
        </div>

        <div class="inputs">
            <input type="email" placeholder="Email" name="email" />
            <input type="password" placeholder="Mot de passe" name="password">
        </div>

        <div align="center">
            <button type="submit" form="connexion_login">Se connecter</button>
        </div>
    </form>
</div>