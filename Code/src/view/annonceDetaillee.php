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
        <img src="<?=$annonce['annoncePhoto']?>"id="img">

        <div class="container" id="texteAnnonce">
            <div>
                <h1><?=$annonce['annonceTitle']?></h1>
            </div>
        <div class="container" id="texte2Annonce">
            <div class="texte">
                <h4><?=$annonce['annonceCategorie']?></h4>
            </div>
            <div class="texte">
                <h4><?=$annonce['annoncePrice']?> CHF</h4>
            </div>
            <div class="texte">
                <h4><?=$annonce['annonceDescription']?></h4>
            </div>
            <div class="texte">
                <h4><?=$annonce['date']?></h4>
            </div>
            <div>
                <br>
                <a href="index.php?action=updateAnnonce&id=<?=$annonce['id']?>" class="btn btn-warning">Modifier</a>
                <a href="index.php?action=deleteAnnonce&id=<?=$annonce['id']?>" class="btn btn-danger">Supprimer</a>
                <?php
                    //TODO AJOUTER EMAIL USER
                ?>
            </div>
        </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require "gabarit.php";
?>
