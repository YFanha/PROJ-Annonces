<?php
/**
 * @file      index.php
 * @brief     This file is the rooter managing the link with controllers.
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 *****************************
 */
session_start();
require "controler/users.php";
require "controler/navigation.php";
require "controler/annonces.php";

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
        default :
            lost();
    }
} else {
    home();
}
