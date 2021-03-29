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
$nbAnnonce = intval(count($annonces));

define("MAX_DESCRIPTION_LENGTH", 100);


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

                <?php
                //Couper la descrition si elle est trop grand pou l'affichage des cartes des annonces (max 175 char)


                $annonceId = $annonce['id'];
                if(strlen($annonce['annonceDescription']) > MAX_DESCRIPTION_LENGTH){
                    $descAnnonce = substr($annonce['annonceDescription'], 0, MAX_DESCRIPTION_LENGTH) . "...";
                } else {
                    $descAnnonce = $annonce['annonceDescription'];
                }
                ?>

                <div class="card" style="width: 18rem;">
                    <img src="<?=$annonce['annoncePhoto']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?=$annonce['annonceTitle']?></strong></h5>
                        <p class="card-text"><?=$descAnnonce?>
                        <p class="card-text">Type : <?=$annonce['annonceCategorie']?></p>
                        <a href="index.php?action=seeAnnonceDetails&annonceId=<?=$annonceId?>" class="btn btn-primary btnAnnonce">Voir annonce</a>
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

