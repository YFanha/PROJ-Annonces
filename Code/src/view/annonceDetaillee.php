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

ob_start();
?>
<div class="container-fluid" id="mainContainerAnnonce">
    <div id="annonceContainer">
        <img class="imgdetaille" src="<?=$annonce['annoncePhoto']?>"id="img">

        <div class="container" id="texteAnnonce">
            <div>
                <h1><strong><?=$annonce['annonceTitle']?></strong></h1>
            </div>
            <div class="container" id="texte2Annonce">
                <div class="texte">
                    <h4><?=$annonce['annonceCategorie']?></h4>
                </div>
                <div class="texte">
                    <h4><?=$annonce['annoncePrice']?> CHF</h4>
                </div>
                <div class="texte">
                    <h4>Posté le <?=$annonce['date']?> par <i><a href="mailto:<?=$userEmail?>" class="link-info"><?=$userEmail?></a></i></h4>
                </div>

                <div class="button">
                    <br>
                    <?php if (!isset($_SESSION['id']) || $_SESSION['id'] !== $annonce['user_id']) :?>
                    <a href="index.php?action=contacter&annonceId=<?=$annonce['id']?>" class="btn btn-primary">Contacter</a>
                    <?php elseif (isset($_SESSION['id']) && $_SESSION['id'] == $annonce['user_id']) :?>
                        <a href="index.php?action=editAnnonce&annonceId=<?=$annonce['id']?>" class="btn btn-warning">Modifier</a>
                        <a href="index.php?action=deleteAnnonce&annonceId=<?=$annonce['id']?>" class="btn btn-danger">Supprimer</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="description">
        <div class="texte">
            <h4><strong>Description</strong></h4>
            <h5><?=$annonce['annonceDescription']?></h5>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require "gabarit.php";
?>
