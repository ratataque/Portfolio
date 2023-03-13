<?php
//echo ("<pre>");
//var_dump($_FILES);
//echo ("</pre>");
$conn = pg_connect("host=db dbname=miel user=miel password=miel");
// phpinfo();
// echo ("<pre>");
// var_dump($_FILES);
// echo ("</pre>");

if (isset($_POST["nom_miel"])) {

    $image = $_FILES['photo']['tmp_name'];
    $image_data = file_get_contents($image,);
    $image_base64 = base64_encode($image_data);

    $requete_id_apiculteur = "SELECT id_apiculteur FROM apiculteur where nom_societe = '" . $_POST["apiculteur"] . "';";
    $table_apiculteur = pg_fetch_all(pg_query($conn, $requete_id_apiculteur));

    if(!empty($table_apiculteur)){
        $requete_miel = ("insert into miel (nom_miel, origine_miel, description_miel, lien_photo_miel, prix_miel, id_apiculteur) values ('".pg_escape_string($conn, $_POST["nom_miel"])."',
                                                                                                                                        '".pg_escape_string($conn, $_POST["origine_miel"])."',
                                                                                                                                        '".pg_escape_string($conn, $_POST["description_miel"])."',
                                                                                                                                        '".$image_base64."',
                                                                                                                                        ".$_POST["prix_miel"].",
                                                                                                                                        '".pg_escape_string($conn, $table_apiculteur[0]["id_apiculteur"])."');");
        pg_query($conn, $requete_miel);
    }

}



?>

<br>
<form action="/gestion/administration.php?content=ajout_miel" method="post" id="form_ajout_miel" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-3 text-center text-sm ">
                <img id="preview-image" src="#" alt="Preview Image" width="150" height="200" />


                <input id="file-upload" type="file" accept="image/*" class="btn-sm" name="photo" onChange="readURL(this);" required />
            </div>
            <div class="col-8  row">
                <div class="col-2">
                </div>
                <div class=" col-8 text-center ">
                    <label for="nom_miel">Nom du miel</label>
                    <input type="v" class="form-control" placeholder="Miel de sapin" name="nom_miel" required>
                    <br>
                    <label for="apiculteur">provient de l'apiculteur: </label>
                    <select class="form-control" id="" name="apiculteur">
                        <option disabled selected value>-- Apiculteur -- </option>
                        <?php
                        $requete_apiculteur = "SELECT * FROM apiculteur;";
                        $table_apiculteur = pg_fetch_all(pg_query($conn, $requete_apiculteur));
                        foreach ($table_apiculteur as $champ => $data) {
                            echo ("<option>" . $data['nom_societe'] . "</option>");
                        }
                        ?>
                    </select>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="col-1 ">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2  row">
                <div class="text-center ">
                    <label for="prix_miel">prix €</label>
                    <input type="number" class="form-control" placeholder="15" name="prix_miel" required>
                </div>
                <div class="text-center ">
                    <label for="prix_miel">origine</label>
                    <input type="text" class="form-control" placeholder="france" name="origine_miel" required>
                </div>
            </div>
            <div class="col-9  row">
                <div class="col-1">
                </div>
                <div class=" col-10 text-center ">
                    <label for="description_miel">description du miel</label>
                    <!-- <input type="text" class="form-control" placeholder="Miel de sapin" name="description_miel" required> -->
                    <textarea class="form-control" id="description_miel" name="description_miel" rows="10" required></textarea>
                </div>
                <div class="col-1">
                </div>
            </div>
            <div class="col-1 ">

            </div>
        </div>

        <div class="row ">
            <div class="text-center">
                <button class="btn btn-secondary btn-lg" type="submit" form="form_ajout_miel" value="Submit">Envoyer</button>
            </div>
        </div>

    </div>
</form>