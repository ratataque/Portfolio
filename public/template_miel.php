<?php
    for ($i = 0; $i < count($miel); $i++) {
        // echo "<pre>";
        // var_dump($miel[$i]);
        // echo "</pre>";

        echo "
            <div class='miel_".$miel[$i]["id_miel"]."'>
                <div class='space_titre'>
                    <div class='titre_miel cacher'>
                        ".$miel[$i]["nom_miel"]."
                    </div>
                </div>
                <div class='pancarte cacher_pancarte'>
                        <img src='./images/pancarte.png' alt=''>
                        <div class='prix'>". $miel[$i]["prix_miel"] ."$</div>
                </div>
                <div class='space_description'>
                    <div class='description cacher_bas'>
                        ". $miel[$i]["description_miel"] ."
                    </div>
                </div>
            </div>";
    }
?>
