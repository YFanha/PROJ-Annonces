<?php
/**
 * @file      navigation.php
 * @brief     This controller is designed to manage all navigation aspect (view controller view)
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @author    Update by Yann.FANHA
 * @version   22.03.2021
 */

/**
 * @brief Fonction qui appelle la page d'acceuil avec des annonces aleatoire a afficher
 */
function home(){
    require "model/annoncesManager.php";


    //Récuperer trois annonce aléatoirement si y'en a plus que trois
    $annonces = getAnnonces();

    $nbrAnnonce = count($annonces);

    //limiter a max trois annonce
    if ($nbrAnnonce > 3){
        $nbrAnnonceToDisplay = 3;
    }else{
        $nbrAnnonceToDisplay = $nbrAnnonce;
    }

    //Valeur max et min des index
    define("MIN_INDEX", 0);
    define("MAX_INDEX", $nbrAnnonce-1);

    for ($i = 0; $i < $nbrAnnonceToDisplay; $i++){
        $indexAnnonceToDisplay[$i] = rand(MIN_INDEX, MAX_INDEX);
    }

    require "view/home.php";
}

/**
 * @brief This function is designed to inform the user that the resource requested doesn't exist (i. e. if the user modify the url manually)
 */
function lost(){
    require "view/lost.php";
}

?>