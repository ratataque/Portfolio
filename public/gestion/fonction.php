<?php
function demande_validation_suppression($data_suppr,$page_origine)
{
    echo ('
        <div class="row">
        <div class="text-center text-danger">
            <p>Validez vous la suppression ?</p>
            <form action="/gestion/administration.php?content='.$page_origine.'" id="verif" method="post">
            <input hidden value=1 name="validation" id="a">
        ');
    foreach ($_POST as $key => $value) {
        if ($key != "demande_supp") {
            echo ('<input hidden value=' . $key . ' name="api_' . $key . '" id="api_' . $key . '">');
        }
    }
    echo ('
        <button type="submit" class="btn btn-outline-success btn-lg" form="verif" value="Submit">Oui</button>
        </form>

        <form action="/gestion/administration.php?content='.$page_origine.'" id="pasDaccord" method="post">
        <input hidden value=0 name="validation" id="a">
        <button type="submit" class="btn btn-outline-danger btn-lg" form="pasDaccord" value="Submit">Non</button>
        </form>
    </div>
    </div>
    ');
}
function affich_Table_apiculteur($tableData)
{
    ?>
    <div class="row text-center  h3">
        <b style="margin-top:5vh;">Liste des Apiculteurs</b>
    </div>
    <div class="row">
        <div class="text-center">
            <form action="/gestion/administration.php?content=gestion_miel" method="post">
                <input hidden value=32 name="demande_supp" id="a">

                <div class="form-group">
                    <table class="table table-striped table-dark h5">
                        <thead class="thead-dark">
                            <tr>
                                <?php
                                foreach ($tableData as $ligne) {
                                    if (next($tableData)) {
                                    } else {
                                        foreach ($ligne as $champ => $value) {
                                            switch ($champ) {
                                                case "lien_photo_apiculteur":
                                                    echo ("<th scope='col'>Logo de la Société</th>");
                                                    break;
                                                case "nom_societe":
                                                    echo ("<th scope='col'>Nom de la Société</th>");
                                                    break;
                                                case "nom_apiculteur":
                                                    echo ("<th scope='col'>Nom de l'apiculteur</th>");
                                                    break;
                                                case "prenom_apiculteur":
                                                    echo ("<th scope='col'>Prénom de l'apiculteur</th>");
                                                    break;
                                                case "id_apiculteur":
                                                    echo ("<th scope='col'>Nombre de miel</th>");
                                                    break;
                                                case "description_apiculteur":
                                                    echo ("<th scope='col'>Supprimer ?</th>");
                                                    break;
                                                default:
                                                    echo ("<th scope='col'>" . $champ . "</th>");
                                                    break;
                                            }
                                        }
                                    }
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo ('<div class="row">');
                            foreach ($tableData as $ligne) {
                                echo ("<tr>");
                                foreach ($ligne as $champ => $value) {
                                    switch ($champ) {
                                        case "lien_photo_apiculteur":
                                            echo ("<td>");
                                            // affichage de l'image
                                            echo ("<img class='show' src='data:image/png;base64, " . $value . "'>");
                                            echo ("</td>");
                                            break;
                                        case "nom_societe":
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                        case "nom_apiculteur":
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                        case "prenom_apiculteur":
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                        case "id_apiculteur":
                                            // echo ("<td>" . $value . "</td>");
                                            $conn = pg_connect("host=db dbname=miel user=miel password=miel");
                                            $sql = "select * from miel where id_apiculteur = " . intval($value) . ";";
                                            $miel_api = pg_fetch_all(pg_query($conn, $sql));
                                            echo ("<td>
                                    <div class ='text-center h2'>
                                    <a href='administration.php?content=detail_miel&id_apiculteur=" . $value . "'><br>Nombre de miel : <br>" . count($miel_api) . "</a>
                                    </div>
                                </td>");
                                            break;
                                        case "description_apiculteur":
                                            echo ("<td>");
                                            echo ('
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="' . $ligne["id_apiculteur"] . '" value="X">
                                </div>
                                ');
                                            echo ("</td>");
                                            break;
                                        default:
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                    }
                                }
                                echo ("</tr>");
                            }
                            echo ('</tbody>');
                            echo ('</table>');
                            echo ('<div class="text-center">');
                            echo ('
                <button class="btn btn-secondary btn-lg" type="submit"  value="Submit">Envoyer</button>
                ');
                            echo ('</div>');
                            echo ('</form>');
                            echo ('</div>');
                            echo ('</div>');
                            echo ('</div>');
}

function affich_Table_miel($tableData, $id)
{
    $conn = pg_connect("host=db dbname=miel user=miel password=miel");
    $sql = "select * from apiculteur where id_apiculteur=" . $id . ";";
    $apiculteur_miel = pg_fetch_all(pg_query($conn, $sql));

    ?>
    <div class="row text-center  h3">
        <b style="margin-top:5vh;">Liste des des miels </b>
    </div>
    <div class="row">
        <div class="text-center">
            <form action="/gestion/administration.php?content=detail_miel" method="post">
                <input hidden value=32 name="demande_supp" id="a">
                <div class="form-group">
                    <table class="table table-striped table-dark h5">
                        <thead class="thead-dark">
                            <tr>
                                <?php
                                foreach ($tableData as $ligne) {
                                    if (next($tableData)) {
                                    } else {
                                        foreach ($ligne as $champ => $value) {
                                            switch ($champ) {
                                                case "lien_photo_miel":
                                                    echo ("<th scope='col'>photo du miel</th>");
                                                    break;
                                                case "nom_miel":
                                                    echo ("<th scope='col'>Nom du miel</th>");
                                                    break;
                                                case "origine_miel":
                                                    echo ("<th scope='col'>origine du miel</th>");
                                                    break;
                                                case "description_miel":
                                                    echo ("<th scope='col'>desription du miel</th>");
                                                    break;
                                                case "prix_miel":
                                                    echo ("<th scope='col'>prix du miel</th>");
                                                    break;
                                                case "id_apiculteur":
                                                    echo ("<th scope='col'>Supprimer ?</th>");
                                                    break;
                                            }
                                        }
                                    }
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo ('<div class="row">');
                            foreach ($tableData as $ligne) {
                                echo ("<tr>");
                                foreach ($ligne as $champ => $value) {
                                    switch ($champ) {
                                        case "lien_photo_miel":
                                            echo ("<td>");
                                            // affichage de l'image
                                            echo ("<img class='show' src='data:image/png;base64, " . $value . "'>");
                                            echo ("</td>");
                                            break;
                                        case "nom_miel":
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                        case "origine_miel":
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                        case "description_miel":
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                        case "prix_miel":
                                            echo ("<td>" . $value . "</td>");
                                            break;
                                        case "id_apiculteur":
                                            echo ("<td>");
                                            echo ('
        <div class="row">
        <div class="text-center">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="' . $ligne["id_miel"] . '" value="X">
        </div>
        </div>
        </div>
        ');

                                            echo ("</td>");
                                            break;
                                    }
                                }
                                echo ("</tr>");
                            }
                            echo ('</tbody>');
                            echo ('</table>');
                            echo ('<div class="text-center">');
                            echo ('
    <button class="btn btn-secondary btn-lg" type="submit"  value="Submit">Envoyer</button>
');
                                    echo ('</div>');
                                    echo ('</form>');
                                    echo ('</div>');
                                    echo ('</div>');
                                    echo ('</div>');
}

function affichTable($tableData, $titre){
    ?>
    
        <div class="row text-center  h3">
            <b style="margin-top:5vh;"><?php echo($titre); ?></b>
        </div>
        <div class="row">
            <div>
                <table class="table table-striped table-dark h5">
    
                    <thead class="thead-dark">
                        <tr>
                            <?php
                            foreach ($tableData  as $ligne) {
                                if(next($tableData)){
                                }else{
                                    foreach ($ligne  as $champ => $value) {
                                        //echo($champ);
                                        echo ("<th scope='col'>".$champ."</th>");
                                    }
                                }    
    
                            } ?>
                        </tr>
                    </thead>
    
                    <tbody>
    
                <?php
    
    
                echo ('<div class="row">');
                foreach ($tableData  as $ligne) {
                    echo ("<tr>");
                    foreach ($ligne  as $champ => $value) {
                        //echo($champ);
                        echo ("<td>" . $value . "</td>");
                    } 
                    echo ("</tr>");
                } 
                echo ('</tbody>');
                echo ('</table>');
                echo ('</div>');
                echo ('</div>');
            }