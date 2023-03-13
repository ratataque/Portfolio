<?php
include('fonction.php');
// echo ("LE POST <br><pre>");
// var_dump($_POST);
// echo ("</pre>");
// echo ("<LE GET <br> <pre>");
// var_dump($_GET);
// echo ("</pre>");
if (isset($_GET["id_apiculteur"])) {
   $id = $_GET["id_apiculteur"];
   $conn = pg_connect("host=db dbname=miel user=miel password=miel");
   $sql = "select * from miel where id_apiculteur=" . $id . ";";
   $table_miel = pg_fetch_all(pg_query($conn, $sql));
   affich_Table_miel($table_miel, $id);
}
if (isset($_POST["demande_supp"])) {
   if ($_POST["demande_supp"]) {
      if (count($_POST) <= 1) {
         ?><script> location.replace("/gestion/administration.php?content=gestion_miel"); </script><?php
      }
      demande_validation_suppression($_POST, 'detail_miel');
   }
}

if (isset($_POST["validation"])) {
   if ($_POST["validation"]) {
      $list_miel_supp = [];
      foreach ($_POST as $key => $value) {
         if ($key != "validation") {
            $conn = pg_connect("host=db dbname=miel user=miel password=miel");
            $sql = "delete from miel where id_miel = $value;";
            pg_query($conn, $sql);
            $data = array("id miel" => $value);
         }
      }
      array_push($list_miel_supp, $data);
      ?>
      <div class="row">
         <div class="text-center">
               <b class="text-success">
                  les différents miels ont bien été supprimé
               </b>
         </div>
      </div>
      <?php
   }else{
      ?><script> location.replace("/gestion/administration.php?content=gestion_miel"); </script><?php
   }
}