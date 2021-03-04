<?php
/**
 * @file      usersManager.php
 * @brief     This model is designed to implements users business logic
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 * ************************
 * @Update
 * @Modify registerNewAccount()
 * @author Yann Fanha
 * @version 04.03.2020
 * ************************
 */

/**
 * @brief This function is designed to verify user's login
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : users's password
 * @return bool : "true" only if the user and psw match the database. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */

function getUsers()
{
    $filename = "data/users.json";
    //Cette fonction renvoie un tableau avec les users
    $tab =  json_decode(file_get_contents($filename),true); // by default, return everything as an associative array
    return $tab; //renvoi du tableau

}


function updateUsers($users){

    //Cette fonction réécrit tout le fichier users.json à partir du tableau associatif
    file_put_contents("data/users.json",json_encode($users, JSON_PRETTY_PRINT));
}
function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;
    //lire tous les users
    $users=getUsers();

    foreach($users as $user){
        if ($user["userEmailAddress"]==$userEmailAddress) {
            $temp = password_verify($userPsw, $user["userHashPsw"]);
            $result = $temp;
        }
    }

    return $result;
}

/**
 * @brief This function is designed to register a new account
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : user's password
 * @param $userName: username
 * @return : true = register correct, 0 = username already used (error), -1 = email already used (error)
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function registerNewAccount($userEmailAddress, $userPsw, $userName)
{
    $result = false;
    //lire le fichier des users

    $users=getUsers();
    //Hash du mot de passe
    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);
    $userEmailAddress = strtolower($userEmailAddress);

    //echo gettype($users);

    //TODO - VERIFIER SI IL EXISTE
    $nbrUsers = count($users); //Variable pour définir le nombre d'utilisateurs inscrit

    $emailAlreadyUsed = false; //valeur par défaut = faux (n'existe pas encore)
    $usrnameAlreadyUsed = false; //Valeur par défaut = false (n'existe pas)

    if($nbrUsers !== 0){ //Si il y'a des utilisateurs déjà inscrit
        for($i = 0; $i < $nbrUsers; $i++){
            if($userEmailAddress == $users[$i]['userEmailAddress']){
                $emailAlreadyUsed = true;
            }
            if($userName == $users[$i]['userName']){
                $usrnameAlreadyUsed = true;
            }
        }
    }


    if(!$emailAlreadyUsed && !$usrnameAlreadyUsed){
        //attribuer un id
        $newID = getNewId($nbrUsers, $users);

        $users[]=array('id'=>$newID, 'userName'=>$userName, 'userEmailAddress'=>$userEmailAddress,"userHashPsw"=>$userHashPsw);


        //réécrire le fichier des users
        updateUsers($users);

        return true;
    } else if ($usrnameAlreadyUsed ||$emailAlreadyUsed){
        return false;
    }

}

function getNewId($nbrUsers, $users){

    //Verifier si il y'a des utilisateurs déjà inscrit, sinon, Id vaudra 0 (premier user);
    if($nbrUsers !== 0){
            //Trouver l'id du derniers utilisateurs et ajouter 1
            $lastID = $users[$nbrUsers-1]['id'];
            $id = $lastID + 1;
    } else {
        $id = 0;
    }

    return $id;
}

function getUserId($email){
    $users = getUsers();
    for($i = 0; $i < count($users); $i++){
        if($email == $users[$i]['userEmailAddress']){
            return $users[$i]['id'];
        }
    }
}