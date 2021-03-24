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
        $annonceServiceType = $newAnnonce['inputAnnonceService'];

        //Verifier les valeur de categorie et de type de service pour etre sur qu'une valeur a été choisie.
        if(($annonceCategorie === "Services" && $annonceServiceType !== "") || ($annonceCategorie !== "Services")){
            $verifAnnonceServiceValue = true;
        }else{
            $verifAnnonceServiceValue = false;
        }


        if($verifAnnonceServiceValue){
            $registerResult = registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annoncePhoto, $annonceServiceType);
            //Verification si l'annonce a bien été enregistrée
            if ($registerResult){
                require "view/affichageAnnonces.php";
            }else{
                require "view/formAnnonce.php";
                $registerErrorMessage = "Echec de l'enregistrement, vérifiez que tous les champs on été rempli.";
            }
        }else{
            $registerErrorMessage = "Echec de l'enregistrement, vérifiez que tous les champs on été rempli.";
            $services = getServices();
            require "view/formAnnonce.php";
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
    $services = getServices();

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


/**
 * @brief Fonction pour modifier une annonce
 * @param $annonceId
 * @param $newAnnonce
 */
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
        $annonceService = $newAnnonce['inputAnnonceService'];


        //Verifier les valeur de categorie et de type de service pour etre sur qu'une valeur a été choisie.
        if(($annonceCategorie === "Services" && $annonceService !== "") || ($annonceCategorie !== "Services")){
            $verifAnnonceServiceValue = true;
        }else{
            $verifAnnonceServiceValue = false;
        }

        if($verifAnnonceServiceValue){
            editDataAnnonce($annonceId, $annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annonceService);
        }else{
            $registerErrorMessage = "Echec de la modification. Vérifiez les valeurs entrées.";
            require "view/formAnnonce.php";
        }


        require "view/affichageAnnonces.php";
    }else{
        $annonce = getAnnonceFromId($annonceId);
        $services = getServices();
        require "view/formAnnonce.php";
    }
}

/**
 * @brief Fonction qui appelle le formulaire pour le contacte des annonces avec l'annonce spécifique et l'utilisateur qui a posté l'annonce
 * @param $annonceId
 */
function contacterAnnonce($annonceId){
    require "model/annoncesManager.php";
    require "model/usersManager.php";
    $annonce = getAnnonceFromId($annonceId);

    $user_id = $annonce['user_id'];

    $user = getUserById($user_id);

    require "view/formulaireContact.php";
}

?>



