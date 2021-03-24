<?php
/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 *
 * ***********************************
 * @author      Updated by Yann.FANHA
 * @version     19.02.2021
 * @update      Mise en forme
 * @CSS         formStyle.css
 */

$title = 'Connectez-vous';

ob_start();

?>

    <?php if ($loginErrorMessage != null) : ?>
        <h5><span style="color:red"><?= $loginErrorMessage; ?></span></h5>
    <?php endif ?>


    <form action="../index.php?action=login" method="post" class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 border bg-light shadow-sm" id="loginForm">
        <h4 class="titre-form">
            Connectez-vous
        </h4>
        <div class="form form-group">
            <input type="email" id="inputUserEmailAddress" class="form-control sizefull" name="inputUserEmailAddress" placeholder="Adresse Email" required>
        </div>

        <div class="form form-group">
            <input id="inputUserPsw" type="password" class="form-control" name="inputUserPsw" placeholder="Mot de passe" required>
        </div>

        <div class="col text-center">
            <button id="btnSubmit" type="submit" class="btn btn-primary btnSubmit">Connexion</button>
        </div>

        <div>
                <span class="form-legend-text">Pas encore incris ? <a href="register.php">Inscrivez-vous ici!</a><span>
        </div>
    </form>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>