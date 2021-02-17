<?php
/**
 * @file      register.php
 * @brief     This view is designed to display the register form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = "S'inscrire - We";
ob_start();
?>

<?php if ($registerErrorMessage != null) : ?>
    <h5><span style="color:red"><?= $registerErrorMessage; ?></span></h5>

<?php endif ?>
    <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);"></section>

    <!--   <section class="login_part padding_top">-->
    <section class="bgwhite p-t-66 p-b-60">

        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6 bg-light">
                    <div class="login_part_form">
                        <div class="login_part_form_inner">
                            <form class="form" action="index.php?action=register" method="post">
                                <h4 class="titre-form">
                                    Inscrivez-vous
                                </h4>
                                <div class="form form-group">
                                    <label for="userEmail"><b>Adresse email</b></label>
                                    <input type="email" class="form-control" placeholder="Email address" name="inputUserEmailAddress" required>
                                </div>

                                <div class="form form-group">
                                    <label for="userPsw"><b>Mot de passe</b></label>
                                    <input type="password" class="form-control" id="password" name="inputUserPsw" placeholder="Mot de passe">
                                </div>

                                <div class="form form-group">
                                    <label for="psw-repeat"><b>Vérifier le mot de passe</b></label>
                                    <input type="password" class="form-control" id="password" name="inputUserPswRepeat" placeholder="Mot de passe (vérification)">
                                </div>

                                <!--<div class="form form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        En soumettant votre demande de compte, vous validez les conditions générales d'utilisation.<a
                                                href="https://termsfeed.com/blog/privacy-policies-vs-terms-conditions/">CGU et vie privée</a>.
                                    </div>
                                    <input type="submit" value="Inscrivez-vous" class="flex-c-m size10 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Vous avez déjà un compte ?</h2>
                            <p>Dans ce cas, afin de retrouver vos données, <br>cliquez sur le lien qui suit :<br>
                                <a href="index.php?action=login" class="tag_btn  ">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>