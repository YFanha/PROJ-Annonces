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

<?php if ($deleteAnnonceErrorMessage != null) : ?>
    <h5><span style="color:red"><?= $deleteAnnonceErrorMessage; ?></span></h5>
<?php endif ?>

<!--col-12 col-xs-12 col-sm-6 col-md-4 col-lg-3-->

<div class="container-fluid" id="center_annonce">
    <div class="row" id="annonce-container">
        <div class="grid-container">
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
            <?php endforeach ?>
        </div>
    </div>
</div>
    <?php
    $content = ob_get_clean();
    require "gabarit.php";
    ?>

