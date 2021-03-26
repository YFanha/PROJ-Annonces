<?php
/**
 * @file      formAnnonce.php
 * @author    Updated by SVY
 * @version   03-MARS-2021
 *
 */

$title = 'Créer votre annonce';

$categories = array("Vente", "Location", "Services");



ob_start();

?>
<?php if ($registerErrorMessage != null) : ?>
    <h5><span style="color:red"><?= $registerErrorMessage; ?></span></h5>
<?php endif ?>


    <form <?php if (!$_GET['annonceId']): ?> action="../index.php?action=addAnnonces" <?php else: ?> action="../index.php?action=editAnnonce&annonceId=<?=$annonceId?>" <?php endif; ?>method="post" enctype="multipart/form-data" class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 border bg-light shadow-sm" id="annonceForm">
        <h4 class="titre-form">
            Créer votre annonce
        </h4>
        <div class="form form-group">
            <input id="name" class="form-control sizefull" name="inputAnnonceTitle" placeholder="Titre de l'annonce" required value="<?=$annonce['annonceTitle']?>">
        </div>
        <div class="form form-group">
            <input type="number" id="prix" class="form-control sizefull" name="inputAnnoncePrice" placeholder="Prix en CHF" required value="<?=$annonce['annoncePrice']?>">
        </div>
        <div class="form form-group">
            <textarea id="description" class="form-control sizefull" name="inputAnnonceDescription" placeholder="Description" required><?=$annonce['annonceDescription']?></textarea>
        </div>
        <div class="form form-group">
            <select name="inputAnnonceCategorie" id="categorie" class="form-control sizefull">
                <option value="">Choisissiez une catégorie</option>
                <?php foreach ($categories as $categorie) :?>
                <option value="<?=$categorie?>" <?php if ($categorie === $annonce['annonceCategorie']) : ?> selected <?php endif;?>> <?=$categorie?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form form-group">
            <select name="inputAnnonceService" id="selectService" class="form-control sizefull hide">
                <option value="">Type de service</option>
                <?php foreach ($services as $service) :?>
                <option value="<?=$service['id']?>"><?=$service['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <?php if (!$_GET['annonceId']): ?>
        <div class="col text-center">
            <input name="inputAnnoncePhoto" id="annonceImg" type="file" accept=".png, .jpg, .jpeg" size="20">
        </div>
        <?php endif; ?>

        <div class="col text-center">
            <button id="btnSubmit" type="submit" class="btn btn-primary btnSubmit">Valider</button>
        </div>
    </form>




<?php
$content = ob_get_clean();
require 'gabarit.php';
?>