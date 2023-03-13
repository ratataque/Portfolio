<?php
global $ID_ELEVE;

if (isset($_POST["commande"]) and isset($_POST["id_eleve"])) {
    global $ID_ELEVE;

    $ID_ELEVE = $_POST["id_eleve"];

    include_once("../../db/connection_sql.php");
    $conn = connection_sql();

    $sql = "INSERT INTO client (nom_client, prenom_client, adresse_client) VALUES (
                                                                    '".$_POST["commande"]['nom_client']."',
                                                                    '".$_POST["commande"]['prenom_client']."', 
                                                                    '".$_POST["commande"]['adresse_client']."') RETURNING id_client;"; 
    $id_client = pg_fetch_all(pg_query($conn, $sql));

    if($id_client !== false){
        $sql = "INSERT INTO commande (prix_total_commande, id_client, id_eleve) VALUES (
                                                                    '".$_POST["commande"]['prix_total_commande']."', 
                                                                    '".$id_client."', '".$ID_ELEVE."') RETURNING id_commande;"; 
        $id_commande = pg_fetch_all(pg_query($conn, $sql));

        $state = true;
        if ($id_commande !== false) {
            foreach ($_POST["commande"]['liste_article'] as $article) {
                $sql = "INSERT INTO produit_commande (quantite_produit_commande, total_produit_commande, id_miel, id_commande) VALUES (
                                                                    '".$article["quantite_produit_commande"]."', 
                                                                    '".$article["total_produit_commande"]."', 
                                                                    '".$article["id_miel"]."', 
                                                                    '".$id_commande."');"; 
                $test = pg_fetch_all(pg_query($conn, $sql));

                $state = (!$test) ? false : $state;
            }
            
            echo(json_encode(array( "state" => $state)));

        } else {
            echo(json_encode(array( "state" => "false")));
        }
    } else {
        echo(json_encode(array( "state" => "false")));
    }
} else {
    http_response_code(401);
    exit();
}

