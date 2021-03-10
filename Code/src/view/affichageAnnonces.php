<?php
/**
 * @file      annonces.php
 * @author    Yann Fanha
 * @version   05.03.2021
 * @brief     Page de l'affichage de toutes les annonces
 * ***************************************************
 */

$title = 'Annonces';

require_once "model/annoncesManager.php";

$annonces = getAnnonces();
ob_start();
?>

<div class="table-responsive">
    <table class="table textcolor">
        <tbody>
        <!--<tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Date d'inscription</th>
            <th>Utilisateurs</th>
            <th>Photo</th>
        </tr>-->
        <?php foreach ($annonces as $annonce) : ?>
                <?php $annonceId = $annonce['id']?>

            <div class="card" style="width: 18rem;">
                <img src="<?=$annonce['annoncePhoto']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$annonce['annonceTitle']?></h5>
                    <p class="card-text"><?=$annonce['annonceDescription']?></p>
                    <p class="card-text"><?=$annonce['annonceCategorie']?></p>
                    <a href="index.php?action=seeAnnonceDetails&id=<?=$annonceId?>" class="btn btn-primary">Voir annonce</a>
                </div>
            </div>

            <!--<tr>
                <td> <a href="index.php?action=seeAnnonceDetails&id=<?=$annonceId?>"> <?=$annonce['id']?></a> </td>
                <td> <a href="index.php?action=seeAnnonceDetails&id=<?=$annonceId?>"> <?=$annonce['annonceTitle']?></a> </td>
                <td class="description"><?=$annonce['annonceDescription']?></td>
                <td><?=$annonce['annoncePrice']?></td>
                <td><?=$annonce['date']?></td>
                <td><?=$annonce['user_id']?></td>
                <td><?=$annonce['annoncePhoto']?></td>
            </tr>-->
        <?php endforeach ?>
        </tbody>
    </table>

    <?php
    $content = ob_get_clean();
    require "gabarit.php";
    ?>

