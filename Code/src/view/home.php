<?php
/**
 * @file      home.php
 * @brief     This view is designed to display the home page
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

ob_start();
$title = "Accueil";
require_once "model/annoncesManager.php";

$annonces = getAnnonces();
$nbAnnonce = intval(count($annonces));

?>
<div class="bienvenu">
    <h1>Bienvenue</h1>
</div>

<div class="descriptionHome">
    Nous travaillons sur un projet dans le cadre du CPNV. Nous devons réaliser un site web permettant à des membre authentifié de publier des annonces pour vendre des articles, mettre en location, ou proposer des services, avec comme "base de données" des fichiers JSON.
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php for ($j= 0; $j < count($indexAnnonceToDisplay); $j++): ?>

        <div class="carousel-item <?php if($j == 0):?>active<?php endif;?>">
            <img class="d-block img_carousel" src="<?=$annonces[$indexAnnonceToDisplay[$j]]['annoncePhoto']?>" alt="First slide">
        </div>

        <?php endfor; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<?php
$content = ob_get_clean();
require "gabarit.php";
?>
