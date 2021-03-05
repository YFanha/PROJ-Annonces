<?php
/**
 * @file      annonces.php
 * @author    Yann Fanha
 * @version   05.03.2021
 * @brief     Page de l'affichage de toutes les annonces
 * ***************************************************
 */

$title = 'Annonces';

ob_start();
?>

<div class="table-responsive">
    <table class="table textcolor">
        <tbody>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Date d'inscription</th>
            <th>Utilisateurs</th>
            <th>Photo</th>
        </tr>
        <?php foreach ($annonces as $annonce) : ?>
            <tr>
               <td><?=$annonce['id']?></td>
               <td><?=$annonce['annonceTitle']?></td>
               <td><?=$annonce['annonceDescription']?></td>
               <td><?=$annonce['annoncePrice']?></td>
               <td><?=$annonce['date']?></td>
               <td><?=$annonce['user_id']?></td>
               <td><?=$annonce['annoncePhoto']?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <?php
    $content = ob_get_clean();
    require "gabarit.php";
    ?>

