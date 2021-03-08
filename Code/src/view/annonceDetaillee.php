<?php
/**
 * @file      affichageAnnonceDetaillee.php
 * @author    Yann Fanha & Sven Volery
 * @version   08.03.2021
 * @brief     affichage détaillée pour chaque annonce
 * ***************************************************
 */

//Tableau "annonce" définit dans annonces.php
$title = $annonce['annonceTitle'];
/*
 *  'id'
 *  'annonceTitle'
 *  'annonceDescription'
 *  'annonceCategorie'
 *  'annoncePrice'
 *  'date'
 *  'user_id'
 *  'annoncePhoto'
 */

ob_start();
?>


<?php
$content = ob_get_clean();
require "gabarit.php";
?>
