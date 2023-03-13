<?php
//echo ("<pre>");
//var_dump($_SESSION);
//echo ("</pre>");
//echo ("<pre>");
//var_dump($_POST);
//echo ("</pre>");

include("fonction.php");
$conn = pg_connect("host=db dbname=miel user=miel password=miel");
$sql = "table apiculteur;";
$table_apiculteur = pg_fetch_all(pg_query($conn, $sql));
$sql = "table miel;";
$table_miel = pg_fetch_all(pg_query($conn, $sql));

if (isset($_POST["demande_supp"])) {
   if (count($_POST) <= 1) {
      ?><script> location.replace("/gestion/administration.php?content=gestion_miel"); </script><?php
   }
   demande_validation_suppression($_POST, 'gestion_miel');
} elseif (isset($_POST["validation"])) {
   if ($_POST["validation"]) {
      $liste_id = "(";
      foreach ($_POST as $key => $value) {
         if (str_starts_with($key, 'api_')) {
            $liste_id .= $value . ', ';
         }
      }
      $liste_id = substr($liste_id, 0, -2);
      $liste_id .= ')';
      echo ($liste_id);
      $sql = "delete from apiculteur where id_apiculteur in " . $liste_id . ";";
      pg_query($conn, $sql);
   } else {
      affich_Table_apiculteur($table_apiculteur);
   }
} else {
   affich_Table_apiculteur($table_apiculteur);
}
?>