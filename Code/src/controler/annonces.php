<?php

function registerAnnonces($newAnnonce){
    if(isset($newAnnonce['inputAnnonceTitle']) &&
        isset($newAnnonce['inputAnnoncePrice']) &&
        isset($newAnnonce['inputAnnonceDescription']) &&
        isset($newAnnonce['inputAnnonceCategorie']) &&
        isset($newAnnonce['inputAnnoncePhoto'])){

        $annonceTitle = $newAnnonce['inputAnnonceTitle'];
        $annoncePrice = $newAnnonce['inputAnnoncePrice'];
        $annonceDescription = $newAnnonce['inputAnnonceDescription'];
        $annonceCategorie = $newAnnonce['inputAnnonceCategorie'];
        $annoncePhoto = $newAnnonce['inputAnnoncePhoto'];

        require "model/annoncesManager.php";
        $registerResult = registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annoncePhoto);
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