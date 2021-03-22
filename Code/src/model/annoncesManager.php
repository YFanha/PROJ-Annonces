<?php
/**
 * @file annoncesManager.php
 * @description Fichier pour la manipulation des données des annonces
 * @author Yann Fanha & Tiago Santos
 */

/**
 * @description : Récupere toutes les annonces
 * @return array annonces inscrite dans le fichier "annonces.json"
*/
function getAnnonces(){
    $filename = "data/annonces.json";
    $annonce =  json_decode(file_get_contents($filename),true);
    return $annonce; //renvoi du tableau des annonces
}

/**
 * @description : Récupéré une seule annonce grace à son id
 * @param $id : id de l'annonce voulu
 * @return Annonce avec l'id correspond au parametre
 */
function getAnnonceFromId($id){
    $annonces = getAnnonces();
    for($index = 0; $index < count($annonces); $index++){
        if($id == $annonces[$index]['id']){
           return $annonces[$index];
        }
    }
}

/**
 * @description : Fonction pour récuper l'index d'une annonce dans le tableau des annonces
 * @param $id : id de l'annonce voulu
 * @return bool|int : index si il y'a une correspondance avec l'id, sinon il retourne faux
 */
function getAnnonceIndexFromId($id){
    $annonces = getAnnonces();
    for($index = 0; $index < count($annonces); $index++){
        if($id == $annonces[$index]['id']){
            return $index;
        }
    }
    return false;
}

/**
 * @param $annonces : Tableau des annonces
 * @return int : retourne un ID non-utilisé pour la nouvelle annonce
 */
function getNewAnnonceId($annonces){
    $nbrAnnonces = count($annonces);

    if($nbrAnnonces !== 0){
        $lastId = $annonces[$nbrAnnonces-1]['id'];
        $id = $lastId+1;
    }else{
        $id = 1;
    }

    return $id;
}

/**
 * @description : Fonction qui réecris les annonces dans le tableau
 * @param $annonces : tableau des annonces à inscrire dans le tableau
 */
function updateAnnonce($annonces){
    $filename = "data/annonces.json";
    file_put_contents($filename, json_encode($annonces, JSON_PRETTY_PRINT));
}

/**
 * @description : Fonction qui enregistre une nouvelle annonce et qui place l'image uploadée dans le dossier des img pour annonces (avec un autre nom pour eviter les doublons)
 * @param $annonceTitle
 * @param $annoncePrice
 * @param $annonceDescription
 * @param $annonceCategorie
 * @param $annoncePhoto => associative tab ('name', 'tmp_name', 'type' .. and others)
 * @return bool
 */
function registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annoncePhoto, $annonceService){
    $result = false;

    $annonces = getAnnonces();
    $id = getNewAnnonceId($annonces);
    $date = date("d.m.Y");


    //-----------modify name to avoid to have to same file name--------------
    $path = "data\img\annonces\\";
    //get the extension
    $extensionFile = "." . pathinfo($annoncePhoto['name'], PATHINFO_EXTENSION);

    $newFilename = strval(time()) . $extensionFile;
    $newFile = $path . $newFilename;


    //move the files into the dir
    if(move_uploaded_file($annoncePhoto['tmp_name'], $newFile)){
        //get the user id
        $user_id = $_SESSION['id'];

        //Verifier la valeur des service
        if($annonceService === ""){
            $annonceService = "-";
        }

        $annonces[] = array('id'=>$id, 'annonceTitle'=>$annonceTitle, 'annonceDescription'=>$annonceDescription, 'annonceCategorie'=>$annonceCategorie, 'service_id'=>$annonceService, 'annoncePrice'=>$annoncePrice, 'date'=>$date, 'user_id'=>$user_id, 'annoncePhoto'=>$newFile);

        updateAnnonce($annonces);

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/**
 * @description : Fonction qui supprime l'annonce et son image
 * @param $index : index de l'annonce a supprimer
 * @return bool si la suppresion a bien marché
 */
function removeAnnonce($index){
    $annonces = getAnnonces();

    //delete img
    unlink($annonces[$index]['annoncePhoto']);

    unset($annonces[$index]);
    $annonces = array_values($annonces);

    if($annonces != false || $annonces == null){
        updateAnnonce($annonces);
        return true;
    }else{
        return false;
    }
}

/**
 * @description : Fonction pour modifier l'annonce directement dans le tableau de toutes les annonces grace à l'index récupéré avec l'id
 * @param $annonceId : ID de l'annonce a modifier
 * @param $annonceTitle : Titre de l'annonce
 * @param $annoncePrice : Prix de l'annonce
 * @param $annonceDescription : Description de l'annonce
 * @param $annonceCategorie : Catégorie de l'annonce
 */
function editDataAnnonce($annonceId, $annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annonceServiceType){
    $annonceIndex = getAnnonceIndexFromId($annonceId);
    $annonces = getAnnonces();

    //Verifier la valeur des service
    if($annonceServiceType === ""){
        $annonceServiceType = "-";
    }

    $annonces[$annonceIndex]['annonceTitle'] = $annonceTitle;
    $annonces[$annonceIndex]['annonceDescription'] = $annonceDescription;
    $annonces[$annonceIndex]['annonceCategorie'] = $annonceCategorie;
    $annonces[$annonceIndex]['annoncePrice'] = $annoncePrice;
    $annonces[$annonceIndex]['date'] = date("d.m.Y");
    $annonces[$annonceIndex]['service_id'] = $annonceServiceType;

    updateAnnonce($annonces);

}

/**
 * @description : fonction qui récupere les valeur dans le fichier
 * @return mixed
 */
function getServices(){
    $filename = "data/services.json";
    $services = json_decode(file_get_contents($filename),true);
    return $services;
}

?>