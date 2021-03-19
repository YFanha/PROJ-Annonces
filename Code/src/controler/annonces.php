<?php
/**
 * @file annoncesManager.php
 * @description Fichier pour l'appelle des fonctions de modifications de données et vérification des données
 * @author Yann Fanha
 */

/**
 * Fonction qui recupere les valeurs du formulaire et les verifie pour ensuite les enregistrer dans le fichier json (fonction annexe)
 * @param $newAnnonce
 * @param $pictureAnnonce
 */
function registerAnnonces($newAnnonce, $pictureAnnonce){
    require "model/annoncesManager.php";

    if(isset($newAnnonce['inputAnnonceTitle']) &&
        isset($newAnnonce['inputAnnoncePrice']) &&
        isset($newAnnonce['inputAnnonceDescription']) &&
        isset($newAnnonce['inputAnnonceCategorie']) &&
        $pictureAnnonce['inputAnnoncePhoto']['error'] == 0 && $newAnnonce['inputAnnonceCategorie'] !== ""){

        $annonceTitle = $newAnnonce['inputAnnonceTitle'];
        $annoncePrice = $newAnnonce['inputAnnoncePrice'];
        $annonceDescription = $newAnnonce['inputAnnonceDescription'];
        $annonceCategorie = $newAnnonce['inputAnnonceCategorie'];
        $annoncePhoto = $pictureAnnonce['inputAnnoncePhoto'];



        $registerResult = registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annoncePhoto);
        if ($registerResult){
            require "view/affichageAnnonces.php";
        }else{
            require "view/formAnnonce.php";
            $registerAnnonceErrorMessage = "Echec de l'enregistrement de l'annonce.";
        }
    } else {
        //recuperer les services
        $services = getServices();
        require "view/formAnnonce.php";
    }
}

/**
 * Appel de la page des annonces
 */
function displayAnnonces(){
    require "view/affichageAnnonces.php";
}

/**
 * Appel de la page des details d'une annonces
 */
function displayAnnonceDetails($annonceId){
    require "model/annoncesManager.php";
    require "model/usersManager.php";

    $annonce = getAnnonceFromId($annonceId);

    $user = getUserById($annonce['user_id']);
    $userEmail = $user['userEmailAddress'];
    require "view/annonceDetaillee.php";
}

/*
 * Fonction pour supprimer les annonces grace a son index
 */
function deleteAnnonce($annonceId){
    require_once "model/annoncesManager.php";
    $index = false;

    $index = getAnnonceIndexFromId($annonceId);

    if ($index != false || $index == 0){
        removeAnnonce($index);
        require "view/affichageAnnonces.php";
    }else{
        $deleteAnnonceErrorMessage = "Echec de la suppression de l'annonce.";
        require "view/affichageAnnonces.php";
    }
}


function editAnnonce($annonceId, $newAnnonce){
    require "model/annoncesManager.php";
    if(isset($newAnnonce['inputAnnonceTitle']) &&
        isset($newAnnonce['inputAnnoncePrice']) &&
        isset($newAnnonce['inputAnnonceDescription']) &&
        isset($newAnnonce['inputAnnonceCategorie']) &&
        $newAnnonce['inputAnnonceCategorie'] !== "") {

        $annonceTitle = $newAnnonce['inputAnnonceTitle'];
        $annoncePrice = $newAnnonce['inputAnnoncePrice'];
        $annonceDescription = $newAnnonce['inputAnnonceDescription'];
        $annonceCategorie = $newAnnonce['inputAnnonceCategorie'];

        editDataAnnonce($annonceId, $annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie);

        require "view/affichageAnnonces.php";
    }else{
        $annonce = getAnnonceFromId($annonceId);

        require "view/formAnnonce.php";
    }
}

function contacterAnnonce($annonceId){
    require "model/annoncesManager.php";
    require "model/usersManager.php";
    $annonce = getAnnonceFromId($annonceId);

    $user_id = $annonce['user_id'];

    $user = getUserById($user_id);

    require "view/formulaireContact.php";
}


?>



