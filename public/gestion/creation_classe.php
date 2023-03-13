<?php
include("fonction.php");
echo ("<pre>");
var_dump($_POST);
echo ("</pre>");
?>

<!-- vérification si creation_classe -->
<?php
if (isset($_POST["creation_classe"])) {
    echo ('
        <div class="container ">
            <form action="/gestion/administration.php?content=creation_classe" id="classe_creer" method="post">
                <div class="row text-center">
                    <div class="col-12">
                        <label for="nom_classe" class="text-black">Nom de la classe</label>
                        <input type="v" class="form-control" placeholder="Exemple : Terminal ES 1" name="nom_classe" required>
                        <label for="nom_classe" class="text-black">Niveau de la classe</label>
                        <select class="form-control" id="" name="niveau_classe">
                        <option disabled selected value>-- Niveau  de la classe -- </option>
        ');
    $conn = pg_connect("host=db dbname=miel user=miel password=miel");
    $requete_niveau = "SELECT * FROM niveau;";
    $table_niveau = pg_fetch_all(pg_query($conn, $requete_niveau));
    foreach ($table_niveau as $champ => $data) {
        echo ("<option>" . $data['nom_niveau'] . "</option>");
    }
    echo ('
                    </select>
                    </div>
                    <div class="col-12">
                        <br>
                        <button type="submit" class="btn btn-outline-success btn-lg" form="classe_creer" value="Submit">
                        Valider la création
                        </button>
                    </div>
                </div>
            </form>
        </div>
        ');


}
if (isset($_POST["nom_classe"])) {
    $conn = pg_connect("host=db dbname=miel user=miel password=miel");
    $nom_classe = pg_escape_string($conn, $_POST["nom_classe"]);
    $sql = "select id_niveau from niveau where nom_niveau = '" . $_POST["niveau_classe"] . "';";
    $id_niveau = pg_fetch_all(pg_query($conn, $sql));
    $val_niveau = intval($id_niveau[0]["id_niveau"]);
    $requete_classe = ("insert into classe_eleve (nom_classe,  id_niveau) values ('".$nom_classe."',".$val_niveau.");");
    pg_query($conn, $requete_classe);
    $data = $_POST["nom_classe"];
    ?>
    <script>
                form = document.createElement("form");
                form.action = "/gestion/administration.php?content=creation_classe";
                form.method = "post";
                form.innerHTML = '<input type="hidden" name="classe_ok" value="<?php echo ($data); ?>">';
                document.body.appendChild(form);
                form.submit();
    </script>
    <?php
}
if (isset($_POST["classe_ok"])) {
    echo ("<div class ='text-center text-success'> 
        la classe <strong>" . $_POST["classe_ok"] . "</strong> à bien été créer.
    </div>
    ");
}
// <!-- Verification si création niveau -->

if (isset($_POST["niveau_ok"])) {
    echo ("<div class ='text-center text-success'> 
        le niveau <strong>" . $_POST["niveau_ok"] . "</strong> à bien été créer.
    </div>
    ");
}
if (isset($_POST["creation_niveau"])) {
    echo ('
        <div class="container ">
            <form action="/gestion/administration.php?content=creation_classe" id="niveau_creer" method="post">
                <div class="row text-center">
                    <div class="col-12">
                        <label for="nom_niveau" class="text-black">Nom du niveau</label>
                        <input type="v" class="form-control" placeholder="Exemple : Terminal" name="nom_niveau" required>
                    </div>
                    <div class="col-12">
                        <br>
                        <button type="submit" class="btn btn-outline-success btn-lg" form="niveau_creer" value="Submit">
                        Valider la création
                        </button>
                    </div>
                </div>
            </form>
        </div>
        ');
}
if (isset($_POST["nom_niveau"])) {
    $conn = pg_connect("host=db dbname=miel user=miel password=miel");
    $requete_niveau = ("insert into niveau (nom_niveau) values ('" . pg_escape_string($conn, $_POST["nom_niveau"]) . "');");
    pg_query($conn, $requete_niveau);
    $data = $_POST["nom_niveau"];
    ?>
    <script>
        form = document.createElement("form");
        form.action = "/gestion/administration.php?content=creation_classe";
        form.method = "post";
        form.innerHTML = '<input type="hidden" name="niveau_ok" value="<?php echo ($data); ?>">';
        document.body.appendChild(form);
        form.submit();
    </script>
    <?php
}
?>

<div class="row">
    <div class="text-center">
        <br>
        <section>
            <div class="row">
                <h1>Outil pour la création de classe : </h1>
                <div class="col-6">
                    <h2>Créer une classe</h2>
                    <form action="/gestion/administration.php?content=creation_classe" id="creation_classe"
                        method="post">
                        <input hidden value=1 name="creation_classe" id="creation_classe">
                        <button type="submit" class="btn btn-outline-warning btn-lg" form="creation_classe"
                            value="Submit">Créer
                            nouvelle classe</button>
                    </form>
                </div>
                <div class="col-6">
                    <h2>Créer un niveau</h2>
                    <form action="/gestion/administration.php?content=creation_classe" id="creation_niveau"
                        method="post">
                        <input hidden value=1 name="creation_niveau" id="creation_niveau">
                        <button type="submit" class="btn btn-outline-warning btn-lg" form="creation_niveau"
                            value="Submit">
                            Créer Nouveau niveau
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <br>
        <section>
            <h1>Gestion des différentes classes : </h1>
            <?php
                $conn = pg_connect("host=db dbname=miel user=miel password=miel");
                $sql = ("table niveau;");
                $liste_niveau = pg_fetch_all(pg_query($conn, $sql));

                foreach ($liste_niveau as $ligne_niveau) {
                    $sql = "select * from classe_eleve where id_niveau = ".$ligne_niveau['id_niveau'].";";
                    $liste_classe = pg_fetch_all(pg_query($conn, $sql));
                    affichTable($liste_classe, $ligne_niveau['nom_niveau']);
                }
            ?>
            <p>

            </p>

        </section>
    </div>
</div>