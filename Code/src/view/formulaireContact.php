<?php

$title = 'Connectez-vous';

ob_start();
?>

<form action="index.php?action=contacterAnnonces" method="post">
    <div>
        <label for="mail">Email</label>
        <input type="text" id="mail" name="mail" value="<?=$user['userEmailAddress']?>" readonly>
    </div>
    <div>
        <label for="titreAnnonce">Titre Annonce</label>
        <input type="text" id="titreAnnonce" name="titreAnnonce" value="<?=$annonce['annonceTitle']?>" readonly>
    </div>
    <div>
        <label for="descriptionAnnonce">Description Annonce</label>
        <textarea id="descriptionAnnonce" name="descriptionAnnonce" readonly><?=$annonce['annonceDescription']?></textarea>
    </div>
    <div>
        <label for="prixAnnonce">Prix Annonce</label>
        <input type="text" id="prixAnnonce" name="prixAnnonce" value="<?=$annonce['annoncePrice']?> CHF " readonly>
    </div>
    <div>
        <label for="msg">Message :</label>
        <textarea id="msg" name="message"></textarea>
    </div>
</form>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>