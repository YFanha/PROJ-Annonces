<?php

function registerAnnonces($newAnnonce, $pictureAnnonce){

    if(isset($newAnnonce['inputAnnonceTitle']) &&
        isset($newAnnonce['inputAnnoncePrice']) &&
        isset($newAnnonce['inputAnnonceDescription']) &&
        isset($newAnnonce['inputAnnonceCategorie']) &&
        $pictureAnnonce['inputAnnoncePhoto']['error'] == 0 && $newAnnonce['inputAnnonceCategorie'] !== "choix"){

        $annonceTitle = $newAnnonce['inputAnnonceTitle'];
        $annoncePrice = $newAnnonce['inputAnnoncePrice'];
        $annonceDescription = $newAnnonce['inputAnnonceDescription'];
        $annonceCategorie = $newAnnonce['inputAnnonceCategorie'];
        $annoncePhoto = $pictureAnnonce['inputAnnoncePhoto'];


        require "model/annoncesManager.php";
        $registerResult = registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annoncePhoto);
        if ($registerResult){
            require "view/affichageAnnonces.php";
        }else{
            require "view/formAnnonce.php";
        }
    } else {
        require "view/formAnnonce.php";
    }
}

function displayAnnonces(){
    require "view/affichageAnnonces.php";
}


function displayAnnonceDetails(){
    require "model/annoncesManager.php";
    $annonce = getAnnonceFromId($_GET['id']);

    require "view/annonceDetaillee.php";
}

function deleteAnnonce(){
    require_once "model/annoncesManager.php";
    $index = false;

    $index = getAnnonceIndexFromId($_GET['id']);

    if ($index != false || $index == 0){
        
    }else{

    }
}

?>