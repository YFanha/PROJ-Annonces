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
    <div id="annonceContainer row">
        <div class="div_img col-12 col-sm-12 col-mg-12 col-lg-12 col-xl-12">
            <img src="<?=$annonce['annoncePhoto']?>" id="img_annonceDetails">
        </div>
        <div class="container col-12 col-sm-12 col-mg-12 col-lg-12 col-xl-12" id="texteAnnonce"">
            <div>
                <h1 id="titleAnnonceDetails"><strong><?=$annonce['annonceTitle']?></strong></h1>
            </div>
            <div id="texte2Annonce">
                <div id="texte_detaille">
                    <h4><?=$annonce['annonceCategorie']?>
                        <?php if (is_numeric($annonce['service_id'])) {
                            //Recuperer la valeur de service grace a l'id
                            $indexService = array_search($annonce['service_id'], array_column($services, 'id'));
                            echo "- ". $services[$indexService]['name'];
                        }?>
                    </h4>
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
                    <a href="index.php?action=contacterAnnonce&annonceId=<?=$annonce['id']?>" class="btn btn-primary">Contacter</a>
                    <?php endif;?>
                    <?php if(isset($_SESSION['id']) && $_SESSION['id'] == $annonce['user_id'] || $_SESSION['userType'] == TYPE_ADMIN) :?>
                        <a href="index.php?action=editAnnonce&annonceId=<?=$annonce['id']?>" class="btn btn-warning">Modifier</a>
                        <a href="index.php?action=deleteAnnonce&annonceId=<?=$annonce['id']?>" class="btn btn-danger">Supprimer</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="description row">
        <div class="texte col-12 col-sm-12 col-mg-12 col-lg-12 col-xl-12">
            <h4><strong>Description</strong></h4>
            <h5><?=$annonce['annonceDescription']?></h5>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require "gabarit.php";
?>
