<?php

function registerAnnonces($newAnnonce){
    if(isset($newAnnonce['inputAnnonceTitle']) &&
        isset($newAnnonce['inputAnnoncePrice']) &&
        isset($newAnnonce['inputAnnonceDescription']) &&
        isset($newAnnonce['inputAnnoncePhoto'])){

        $annonceTitle = $newAnnonce['inputAnnonceTitle'];
        $annoncePrice = $newAnnonce['inputAnnoncePrice'];
        $annonceDescription = $newAnnonce['inputAnnonceDescription'];
        $annoncePhoto = $newAnnonce['inputAnnoncePhoto'];

        require "model/annoncesManager.php";
        $registerResult = registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annoncePhoto);
        if ($registerResult){
            require "view/home.php";
        }else{
            require "view/formAnnonce.php";
        }
    } else {
        require "view/formAnnonce.php";
    }
}

?>