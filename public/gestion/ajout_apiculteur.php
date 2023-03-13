<?php
//echo ("<pre>");
//var_dump($_POST);
//echo ("</pre>");

// echo ("<pre>");
// var_dump($_FILES);
// echo ("</pre>");
$conn = pg_connect("host=db dbname=miel user=miel password=miel");

if (isset($_POST["nom_societe"])) {

    $image = $_FILES['photo']['tmp_name'];
    $image_data = file_get_contents($image);
    $image_base64 = base64_encode($image_data);

    $requete_miel = ("insert into apiculteur (lien_photo_apiculteur, nom_societe, nom_apiculteur, prenom_apiculteur, description_apiculteur ) values ('" . $image_base64 . "',
                                                                                                                                                '" .pg_escape_string($conn, $_POST["nom_societe"]) . "',
                                                                                                                                                '" .pg_escape_string($conn, $_POST["nom_apiculteur"]) . "',
                                                                                                                                                '" .pg_escape_string($conn, $_POST["prenom_apiculteur"]) . "',
                                                                                                                                                '" .pg_escape_string($conn, $_POST["description_apiculteur"]) . "');");
    pg_query($conn, $requete_miel);
    //echo($requete_miel);
}




?>

<br>
<form action="/gestion/administration.php?content=ajout_apiculteur" method="post" id="form_ajout_apiculteur" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-2 text-center">
                <img id="preview-image" src="#" alt="Preview Image" width="150" height="200" />
                <input id="file-upload" type="file" accept="image/*" name="photo" onChange="readURL(this);" required />
            </div>
            <div class="col-9  row">
                <div class="col-2">
                </div>
                <div class=" col-8 text-center ">
                    <label for="nom_societe">Nom de la société :</label>
                    <input type="text" class="form-control" placeholder="Abeille et compagnie" name="nom_societe" required>

                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="col-1 ">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-5  ">
                <div class="text-center ">
                    <label for="nom_apiculteur">Nom de l'apiculteur</label>
                    <input type="text" class="form-control" placeholder="dupont" name="nom_apiculteur" required>

                    <label for="prenom_apiculteur">prenom de l'apiculteur</label>
                    <input type="text" class="form-control" placeholder="josé" name="prenom_apiculteur" required>
                </div>
            </div>
            <div class="col-7  ">
                <div class="col-1">
                </div>
                <div class=" col-10 text-center ">
                    <label for="description_apiculteur">description de l'apiculteur</label>
                    <!-- <input type="text" class="form-control" placeholder="apiculteur de sapin" name="description_apiculteur" required> -->
                    <textarea class="form-control" id="description_apiculteur" name="description_apiculteur" rows="10" required></textarea>
                </div>

            </div>
        </div>

        <div class="row ">
            <div class="text-center">
                <button class="btn btn-secondary btn-lg" type="submit" form="form_ajout_apiculteur" value="Submit">Envoyer</button>
            </div>
        </div>

    </div>
</form>