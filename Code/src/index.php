<?php
/**
 * @file      index.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @author    Updated by Yann.FANHA
 * @version   24.03.2021
 *****************************
 */
session_start();
require "controler/users.php";
require "controler/navigation.php";
require "controler/annonces.php";

//************** Déclaration de CONSTANTE **************
//Définir le type de compte
define("TYPE_ADMIN", 2);
define("TYPE_CLIENT", 1);

define("PATH_IMG_GEN", "data/img/default_img/"); //chemin pour le dossier des images générique
define("PATH_IMG", "data\img\annonces\\"); //Chemin pour le dossier des images des annonces

define("MAX_DESCRIPTION_LENGTH", 100); //Nombre de caractère max pour l'affichage des descriptions


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'register' :
            register($_POST);
            break;
        case 'addAnnonces':
            registerAnnonces($_POST, $_FILES);
            break;
        case 'displayAnnonces':
            displayAnnonces();
            break;
        case 'seeAnnonceDetails':
            displayAnnonceDetails($_GET['annonceId']);
            break;
        case 'deleteAnnonce':
            deleteAnnonce($_GET['annonceId']);
            break;
        case 'editAnnonce':
            editAnnonce($_GET['annonceId'], $_POST);
            break;
        case 'contacterAnnonce':
            contacterAnnonce($_GET['annonceId']);
            break;
        case 'sendEmail':
            sendEmail($_POST);
            break;
        default :
            lost();
    }
} else {
    home();
}
