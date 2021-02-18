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
    <!--<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(view/content/images/home_slide_2.jpg);"></section>-->

    <!--   <section class="login_part padding_top">-->
    <section class="bg-white p-t-66 p-b-60">

        <div class="container" id="mainContainer">
            <div class="row align-items-center bg-light border shadow-sm" id="div_formRegisterLogin">

                <div class="col-lg-6 col-md-6" id="log">

                    <form action="index.php?action=register" method="post" id="registerForm">
                        <h4 class="titre-form">
                            Inscrivez-vous
                        </h4>

                        <div class="form form-group">
                            <label for="userName"><b>Nom d'utilisateur</b></label>
                            <input type="userName" class="form-control" placeholder="Nom d'utilisateur" name="inputUserName" required>
                        </div>

                        <div class="form form-group">
                            <label for="userEmail"><b>Adresse email</b></label>
                            <input type="email" class="form-control" placeholder="Adresse email" name="inputUserEmailAddress" required>
                        </div>

                        <div class="form form-group">
                            <label for="userPsw"><b>Mot de passe</b></label>
                            <input type="password" class="form-control" id="password" name="inputUserPsw" placeholder="Mot de passe">
                        </div>

                        <div class="form form-group">
                            <label for="psw-repeat"><b>Vérifier le mot de passe</b></label>
                            <input type="password" class="form-control" id="password" name="inputUserPswRepeat" placeholder="Mot de passe (vérification)">
                        </div>

                        <div class="form form-group">
                            <input id="inscrire" type="submit" value="Inscrivez-vous" class="btn btn-primary btnSubmit">
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-md-6 bg-light" id="div_login">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_inner">
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