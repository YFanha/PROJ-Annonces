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

    <!-- Title Page -->
    <!--<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);">
        <h2 class="l-text2 t-center">
            Login
        </h2>
    </section>


    <section class="bgwhite p-t-66 p-b-60">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <?php //if ($loginErrorMessage != null) : ?>
                    <?php if (isset($loginErrorMessage)) : ?>
                        <h5><span style="color:red"><?= $loginErrorMessage; ?></span></h5>
                    <?php endif ?>

                    <form class="col-12 col-sm-8 col-md-8 col-lg-5 col-xl-4 border border-primary shadow-sm" action="index.php?action=login" method="post" id="loginForm" >
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Connectez-vous
                        </h4>

                        <div class="form-group">
                            <input type="email" class="" id="inputUserEmailAddress" name="inputUserEmailAddress" placeholder="Adresse email" required>
                        </div>


                        <div class="bo4 of-hidden size15 m-b-20">
                            <input type="email" class="sizefull s-text7 p-l-22 p-r-22" id="inputUserEmailAddress" name="inputUserEmailAddress" placeholder="Adresse email" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="inputUserPsw" placeholder="Mot de passe">
                        </div>
                        <div>
                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>-->

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