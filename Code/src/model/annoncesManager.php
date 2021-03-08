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

function getAnnonceFromId($id){
    $annonces = getAnnonces();
    for($index = 0; $index < count($annonces); $index++){
        if($id == $annonces[$index]['id']){
           return $annonces[$index];
        }
    }

}

function updateAnnonce($annonces){
    $filename = "data/annonces.json";
    file_put_contents($filename, json_encode($annonces, JSON_PRETTY_PRINT));
}

/**
 * @param $annonceTitle
 * @param $annoncePrice
 * @param $annonceDescription
 * @param $annonceCategorie
 * @param $annoncePhoto => associative tab ('name', 'tmp_name', 'type' .. and others)
 * @return bool
 */
function registerNewAnnonce($annonceTitle, $annoncePrice, $annonceDescription, $annonceCategorie, $annoncePhoto){
    $result = false;

    $annonces = getAnnonces();
    $id = getNewAnnonceId($annonces);
    $date = date("d.m.Y");


    //-----------modify name to avoid to have to same file name--------------
    $path = "view\content\img\annonces\\";
    //get the extension
    $extensionFile = "." . pathinfo($annoncePhoto['name'], PATHINFO_EXTENSION);

    $newFilename = strval(time()) . $extensionFile;
    $newFile = $path . $newFilename;


    //move the files into the dir
    if(move_uploaded_file($annoncePhoto['tmp_name'], $newFile)){
        //get the user id
        $user_id = $_SESSION['id'];

        $annonces[] = array('id'=>$id, 'annonceTitle'=>$annonceTitle, 'annonceDescription'=>$annonceDescription, 'annonceCategorie'=>$annonceCategorie, 'annoncePrice'=>$annoncePrice, 'date'=>$date, 'user_id'=>$user_id, 'annoncePhoto'=>$newFile);

        updateAnnonce($annonces);

        $result = true;
    } else {
        $result = false;
    }
    return $result;
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