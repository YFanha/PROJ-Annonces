<?php
/**
 * @file      formAnnonce.php
 * @author    Updated by SVY
 * @version   03-MARS-2021
 *
 */

$title = 'Créer votre annonce';

ob_start();
?>

<form action="../index.php?action=addAnnonces" method="post" enctype="multipart/form-data" class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 border bg-light shadow-sm" id="annonceForm">
    <h4 class="titre-form">
        Créer votre annonce
    </h4>
    <div class="form form-group">
        <input id="name" class="form-control sizefull" name="inputAnnonceTitle" placeholder="Titre de l'annonce" required>
    </div>
    <div class="form form-group">
        <input type="number" id="prix" class="form-control sizefull" name="inputAnnoncePrice" placeholder="Prix en CHF" required>
    </div>
    <div class="form form-group">
        <textarea id="description" class="form-control sizefull" name="inputAnnonceDescription" placeholder="Description" required></textarea>
    </div>
    <div class="form form-group">
        <select name="inputAnnonceCategorie" id="categorie" class="form-control sizefull">
            <option value="choix">Choisissiez une catégorie</option>
            <option value="Vente">Vente</option>
            <option value="Location">Location</option>
            <option value="Services">Services</option>
        </select>
    </div>
    <div class="col text-center">
        <input name="inputAnnoncePhoto" type="file" accept=".png, .jpg, .jpeg" size="20" required/>
    </div>
    <div class="col text-center">
        <button id="btnSubmit" type="submit" class="btn btn-primary btnSubmit">Valider</button>
    </div>

</form>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>


