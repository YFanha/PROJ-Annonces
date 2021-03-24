<?php

$title = 'Connectez-vous';

ob_start();
?>

<form action="index.php?action=sendEmail" class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 border bg-light shadow-sm" method="post">
<form action="index.php?action=sendEmail" id="contactForm" class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 border bg-light shadow-sm" method="post">
    <h4 class="titre-form">
        Envoyer un mail pour l'annonce <?=$annonce['annonceTitle']?>
    </h4>
    <div class="form form-group">
        <label for="mail">Email</label>
        <input class="form-control sizefull" type="text" id="mail" name="emailTo" value="<?=$user['userEmailAddress']?>" readonly>
    </div>
    <div class="form form-group">
        <label for="titreAnnonce">Titre Annonce</label>
        <input class="form-control sizefull" type="text" id="titreAnnonce" name="titreAnnonce" value="<?=$annonce['annonceTitle']?>" readonly>
    </div>
    <!--<div class="form form-group">
        <label  for="descriptionAnnonce">Description Annonce</label>
        <textarea class="form-control sizefull" id="descriptionAnnonce" name="descriptionAnnonce" readonly><?=$annonce['annonceDescription']?></textarea>
    </div class="form form-group">
    <div>
        <label for="prixAnnonce">Prix Annonce</label>
        <input class="form-control sizefull" type="text" id="prixAnnonce" name="prixAnnonce" value="<?=$annonce['annoncePrice']?> CHF " readonly>
    </div>-->
    <div class="form form-group">
        <label for="msg">Message :</label>
        <textarea class="form-control sizefull" id="msg" name="message"></textarea>
    </div>
    <div class="col text-center">
        <button id="btnSendEmail" type="submit" class="btn btn-primary btnSubmit">Envoyer</button>
    </div>
</form>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>