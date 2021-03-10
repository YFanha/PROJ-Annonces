<?php
/**
 * @file annoncesManager.php
 * @description Fichier pour l'appelle des fonctions de modifications de données et vérification des données
 * @author Yann Fanha
 */
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
            $registerAnnonceErrorMessage = "Echec de l'enregistrement de l'annonce.";
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
    require "model/usersManager.php";

    $annonce = getAnnonceFromId($_GET['id']);

    $user = getUserById($annonce['user_id']);
    $userEmail = $user['userEmailAddress'];
    require "view/annonceDetaillee.php";
}

function deleteAnnonce(){
    require_once "model/annoncesManager.php";
    $index = false;

    $index = getAnnonceIndexFromId($_GET['id']);

    if ($index != false || $index == 0){
        removeAnnonce($index);
        require "view/affichageAnnonces.php";
    }else{
        $deleteAnnonceErrorMessage = "Echec de la suppression de l'annonce.";
    }
}

?>