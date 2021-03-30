<?php

/**
 * @file      users.php
 * @brief     This controller is designed to manage all users actions
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
*/

use PHPMailer\PHPMailer\PHPMailer;

/**
 * @brief This function is designed to create a new user session
 * @param $userEmailAddress : user unique id, must be meet RFC 5321/5322
 */
function createSession($userEmailAddress)
{
    //Get ID of the user
    $id = getUserId($userEmailAddress);
    $userType = getUserType($id);

    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['id'] = $id;
    $_SESSION['userType'] = $userType;
}

/**
 * @brief This function is designed to manage login request
 * @param $loginRequest containing login fields required to authenticate the user
 */
function login($loginRequest)
{
    //if login request was submitted
    try {
        if (isset($loginRequest['inputUserEmailAddress']) && isset($loginRequest['inputUserPsw'])) {
            //extract login parameters
            $userEmailAddress = $loginRequest['inputUserEmailAddress'];
            //mettre l'email en minuscule, pour l'identification (case-sensitive)
            $userEmailAddress = strtolower($userEmailAddress);
            $userPsw = $loginRequest['inputUserPsw'];

            //try to check if user/psw are matching with the database
            require_once "model/usersManager.php";
            if (isLoginCorrect($userEmailAddress, $userPsw)) {
                $loginErrorMessage = null;
                createSession($userEmailAddress);
                displayAnnonces();
            } else { //if the user/psw does not match, login form appears again with an error message
                $loginErrorMessage = "L'adresse email et/ou le mot de passe ne correspondent pas !";
                require "view/login.php";
            }
        } else { //the user does not yet fill the form
            require "view/login.php";
        }
    } catch (ModelDataBaseException $ex) {
        $loginErrorMessage = "Nous rencontrons actuellement un problème technique. Il est temporairement impossible de s'annoncer. Désolé du dérangement !";
        require "view/login.php";
    }
}

/**
 * @brief This function is designed to manage logout request
 * @remark In case of login, the user session will be destroyed.
 */
function logout()
{
    $_SESSION = array();
    session_destroy();
    home();
}

/**
 * @brief This function is designed manage the register request
 * @param $registerRequest : contains all fields mandatory and optional to register a new user (coming from a form)
 */
function register($registerRequest)
{
    try {
        //variable set
        if (isset($registerRequest['inputUserEmailAddress']) && isset($registerRequest['inputUserPsw']) && isset($registerRequest['inputUserPswRepeat']) && isset($registerRequest['inputUserName'])) {

            //extract register parameters
            $userEmailAddress = $registerRequest['inputUserEmailAddress'];
            //mettre l'email en minuscule, pour l'identification (case-sensitive)
            $userEmailAddress = strtolower($userEmailAddress);

            $userPsw = $registerRequest['inputUserPsw'];
            $userPswRepeat = $registerRequest['inputUserPswRepeat'];
            $userName = $registerRequest['inputUserName'];

            if ($userPsw == $userPswRepeat) {
                require_once "model/usersManager.php";
                $registerResult = registerNewAccount($userEmailAddress, $userPsw, $userName);
                if ($registerResult) {
                    createSession($userEmailAddress);
                    $registerErrorMessage = null;
                    home();
                } else if (!$registerResult) {
                    $registerErrorMessage = "Le nom d'utilisateur est déjà utilisé.";
                    require "view/register.php";
                }
            } else {
                $registerErrorMessage = "Les mots de passe ne sont pas similaires !";
                require "view/register.php";
            }
        } else {
            $registerErrorMessage = null;
            require "view/register.php";
        }
    } catch (ModelDataBaseException $ex) {
        $registerErrorMessage = "Nous rencontrons actuellement un problème technique. Il est temporairement impossible de s'enregistrer. Désolé du dérangement !";
        require "view/register.php";
    }
}

/**
 * @brief Fonction qui envoye un mail à la personne qui a posté l'annonce
 * @param $message
 * @throws \PHPMailer\PHPMailer\Exception
 */
function sendEmail($message){
    require_once "PHPMailer/PHPMailerAutoload.php";
    require_once "PHPMailer/src/PHPMailer.php";
    require_once "PHPMailer/src/SMTP.php";
    require_once "PHPMailer/src/Exception.php";

    //compte qui envoi le message
    $emailDenvoi = "cpnv.webannonce2021@outlook.com";
    $password = "nffPBj3JsRqw5xi";
    //SRV
    $host = "SMTP.office365.com";
    $port = 587 ;
    $SMTPSecure = "starttls";


    //msg
    $emailFrom = $_SESSION['userEmailAddress']; //Celui qui envoi le message
    $subject = $message['titreAnnonce']; //L'objet du mail
    $body = $message['message']; // le message

    //Le destinataire
    $emailTo = $message['emailTo'];

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = $host;
    $mail->SMTPAuth = true;
    $mail->Username = $emailDenvoi;
    $mail->Password = $password;
    $mail->Port = 587;
    $mail->SMTPSecure = $SMTPSecure;

    $mail->From = $emailDenvoi;
    $mail->FromName= "Web Annonce";
    $mail->addReplyTo($emailFrom);

    $mail->addAddress($emailTo);
    $mail->Subject = "$emailFrom -> ($subject)";
    $mail->Body = $body;

    if($mail->send()){
        require "view/affichageAnnonces.php";
    }else{
        $contactError = "Un problème est survenu, contactez <a href='mailto:Yann.FANHA-DIAS@cpnv.ch'>Yann.FANHA-DIAS@cpnv.ch</a> ou réessayez plus tard.";
        contacterAnnonce($message['annonce_id']);
    }


}
?>
