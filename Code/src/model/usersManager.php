<?php
/**
 * @file      usersManager.php
 * @brief     This model is designed to implements users business logic
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 * ************************
 * @Update
 * @Modify Add fonctions
 * @author Yann Fanha
 * last edit :  10.03.2020
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

/**
 * @brief fonction qui réecrit le tableau des utilisateurs dans le fichier JSON
 * @param $users
 */
function updateUsers($users){

    //Cette fonction réécrit tout le fichier users.json à partir du tableau associatif
    file_put_contents("data/users.json",json_encode($users, JSON_PRETTY_PRINT));
}

/**
 * @description : Fonction pour verifier si l'email et les mots de passe correspondent bien
 * @param $userEmailAddress : user's email
 * @param $userPsw user's password
 * @return bool
 */
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

    //mettre l'email en minuscule
    $userEmailAddress = strtolower($userEmailAddress);

    //Déclarer type de compte qu'on crée
    $userType = TYPE_CLIENT;

    //nombre d'utilisateur déjà inscrit
    $nbrUsers = count($users);


    //Verifier si le compte n'existe pas encore
    $emailAlreadyUsed = false; //valeur par défaut = faux (n'existe pas encore)
    $usrnameAlreadyUsed = false; //Valeur par défaut = false (n'existe pas)

    if($nbrUsers !== 0){
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

        $users[]=array('id'=>$newID, 'userName'=>$userName, 'userEmailAddress'=>$userEmailAddress,"userHashPsw"=>$userHashPsw, "userType"=>$userType);


        //réécrire le fichier des users
        updateUsers($users);

        return true;
    } else if ($usrnameAlreadyUsed || $emailAlreadyUsed){
        return false;
    }

}

/**
 * @brief Fonction qui sert à définir un nouvel Id pour le nouvel utilisateurs
 * @param $nbrUsers : nombre d'utilisateurs
 * @param $users :  tableau des utilisateurs
 * @return int : Nouvel Id pour un nouvel utilisateur
 */
function getNewId($nbrUsers, $users){

    //Verifier si il y'a des utilisateurs déjà inscrit, sinon, Id vaudra 0 (premier user);
    if($nbrUsers !== 0){
            //Trouver l'id du derniers utilisateurs et ajouter 1
            $lastID = $users[$nbrUsers-1]['id'];
            $id = $lastID + 1;
    } else {
        $id = 1;
    }

    return $id;
}

/**
 * @brief Fonction qui retrouve un utilisateurs avec son id
 * @param $id : id recherché
 * @return array : valeur de l'utilisateur correspondant à l'id
 */
function getUserById($id){
    $users = getUsers();
    for($i = 0; $i < count($users); $i++){
        if($id == $users[$i]['id']){
            return $users[$i];
        }
    }
}

/**
 * @brief Fonction qui renvoi l'id d'un utilisateur avec son email
 * @param $email : email de l'utilisateur dont nous voulons l'id
 * @return numeric : ID of user
 */
function getUserId($email){
    $users = getUsers();
    for($i = 0; $i < count($users); $i++){
        if($email == $users[$i]['userEmailAddress']){
            return $users[$i]['id'];
        }
    }
}

function getUserType($id){
    $users = getUsers();
    $label = 'id';
    $index = array_search($id, array_column($users, $label));

    return $users[$index]['type_id'];
}
?>