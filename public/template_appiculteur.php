<?php
    for ($i = 0; $i < count($apiculteur); $i++) {
        // echo "<pre>";
        // var_dump($miel[$i]);
        // echo "</pre>";
        $font = 2.4 - (strlen($apiculteur[$i]["nom_societe"]) - 4) * 0.1;

        echo "
            <div class='apiculteur_".$apiculteur[$i]["id_apiculteur"]."'>
                <div class='space_titre'>
                    <div class='titre_miel cacher'>
                        ".$apiculteur[$i]["nom_apiculteur"]."
                        ".$apiculteur[$i]["prenom_apiculteur"]."
                    </div>
                    
                </div>
                <div class='pancarte cacher_pancarte'>
                        <img src='./images/pancarte.png' alt=''>
                        <div class='prix' style='font-size: ".$font."vw;'>". $apiculteur[$i]["nom_societe"] ."</div>
                </div>
                <div class='space_description'>
                    <div class='description cacher_bas'>
                        ". $apiculteur[$i]["description_apiculteur"] ."
                    </div>
                </div>
            </div>";
    }
?>
