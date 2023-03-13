<?php


function eleve_login($login, $mdp){
    global $conn;
    global $ID_ELEVE;
    global $NOM_ELEVE;
    global $PRENOM_ELEVE;

    $sql = "table eleve;"; 
    $table = pg_fetch_all(pg_query($conn, $sql));

    $login_valid = false;

    foreach ($table as $line) {
        if ($line["nom_eleve"] == $login and $line["password_eleve"] == $mdp){
            $login_valid = true;
            $ID_ELEVE = $line["id_eleve"];
            $NOM_ELEVE = $line["nom_eleve"];
            $PRENOM_ELEVE = $line["prenom_eleve"];
            break;
        }
    }
    return $login_valid;
}

function get_list_commande($id_eleve){
    global $conn;
    global $list_miel;

    // $sql = "SELECT * FROM commande WHERE id_eleve=$id_eleve;"; 
    $sql = "SELECT
            commande.*, client.*, produit_commande.*, miel.id_miel, miel.nom_miel, miel.prix_miel 
            FROM commande
            LEFT JOIN client
            ON  commande.id_client = client.id_client
            LEFT JOIN produit_commande
            ON  commande.id_commande = produit_commande.id_commande
            LEFT JOIN miel
            ON produit_commande.id_miel = miel.id_miel
            WHERE commande.id_eleve = $id_eleve;";

    $list_commandes = pg_fetch_all(pg_query($conn, $sql));
    // var_dump($list_commandes);

    $last_command = "-1";
    $payload = []; 
    $i = -1;
    foreach ($list_commandes as $commande) {
        if ($commande['id_commande'] !== $last_command) {
            $payload[$commande['id_client']] = array(
                                        "id_commande" => $commande['id_commande'],
                                        "id_client" => $commande['id_client'],
                                        "nom_client" => $commande['nom_client'],
                                        "prenom_client" => $commande['prenom_client'],
                                        "adresse_client" => $commande['adresse_client'],
                                        "prix_total_commande" => $commande["prix_total_commande"],
                                        "liste_article" => []
                                    );
            $last_command = $commande['id_commande'];
            $i++;
        }
        // print_r($payload);

        array_push($payload[$commande['id_client']]["liste_article"], array(
                                                        "id_miel" => $commande['id_miel'],
                                                        "nom_miel" => $commande['nom_miel'],
                                                        "prix_miel" => $commande['prix_miel'],
                                                        "quantite_produit_commande" => $commande['quantite_produit_commande'],
                                                        "total_produit_commande" => $commande['total_produit_commande']
                                                    ));
    }

    // array_push($payload, array("miel" => $list_miel));

    return $payload;
}

if (isset($_POST["login"]) and isset($_POST["password"])) {

    include_once("../../db/connection_sql.php");
    $conn = connection_sql();

    $sql = "SELECT id_miel, nom_miel, prix_miel FROM miel;"; 
    $list_miel = pg_fetch_all(pg_query($conn, $sql));

    // $connection_valide = eleve_login("test", "passtest");
    // echo(json_encode(array( "login" => $connection_valide)));
    // echo "<pre>";
    // var_dump(get_list_commande(1));
    // get_list_commande(4);
    // echo "</pre>";

    global $ID_ELEVE;
    global $NOM_ELEVE;
    global $PRENOM_ELEVE;

    $connection_valide = eleve_login($_POST["login"], $_POST["password"]);

    if($connection_valide){
        $list_commandes = get_list_commande($ID_ELEVE);
        echo(json_encode(array( "state" => $connection_valide, "Commandes" => array("liste_commandes" => $list_commandes, "id_eleve" => $ID_ELEVE, "nom_eleve" => $NOM_ELEVE, "prenom_eleve" => $PRENOM_ELEVE), "miel" => array("liste_miel" => $list_miel))));
    } else {
        echo(json_encode(array( "state" => $connection_valide)));
    }
} else {
    http_response_code(401);
    exit();
}


