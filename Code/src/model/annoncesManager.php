<?php
/**
 * @file annoncesManager.php
 * @description Fichier pour la manipulation des données des annonces
 * @author Yann Fanha
 *
 */

/**
 * @return Annonces inscrite dans le fichier "annonces.json"
*/
function getAnnonces(){
    $filename = "data/annonces.json";
    $annonce =  json_decode(file_get_contents($filename),true);
    return $annonce; //renvoi du tableau des annonces
}

function updateAnnonce($annonces){
    $filename = "data/annonces.json";
    file_put_contents($filename, json_encode($annonces, JSON_PRETTY_PRINT));
}

function registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annoncePhoto){
    $result = false;

    $annonces = getAnnonces();
    $id = getNewAnnonceId($annonces);
    $date = date("d.m.Y");

    //add path to the photo
    $path = "view\content\imgAnnonce\\";
    $annoncePhoto = $path . $annoncePhoto;

    //get the user id
    $user_id = $_SESSION['id'];

    $annonces[] = array('id'=>$id, 'annonceTitle'=>$annonceTitle, 'annonceDescription'=>$annonceDescription, 'annoncePrice'=>$annoncePrice, 'date'=>$date, 'user_id'=>$user_id, 'annoncePhoto'=>$annoncePhoto);

    updateAnnonce($annonces);

    return true;
}

function getNewAnnonceId($annonces){
    $nbrAnnonces = count($annonces);

    if($nbrAnnonces !== 0){
        $lastId = $annonces[$nbrAnnonces-1]['id'];
        $id = $lastId+1;
    }else{
        $id = 0;
    }

    return $id;
}

?>