<?php
/**
 * @file      gabarit.php
 * @brief     This view is designed to centralize all common graphical component like header and footer (will be call by all views)
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY & Pascal BENZONANA
 * @version   03-MAY-2020
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title; ?></title>
    <meta charset="UTF-8">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--
    Next Level CSS Template
    https://templatemo.com/tm-532-next-level
    -->
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="view/content/css/all.min.css" />
    <link rel="stylesheet" href="view/content/css/bootstrap.min.css" />
    <link rel="stylesheet" href="view/content/css/templatemo-style.css" />

    <!-- stylesheet -->
    <link rel="stylesheet" href="view/content/Style/formStyle.css" />
    <link rel="stylesheet" href="view/content/Style/nav.css" />
    <link rel="stylesheet" href="view/content/Style/annonces.css" />
    <link rel="stylesheet" href="view/content/Style/homeStyle.css" />

    <!-- Ion-Icons -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</head>

<body>
<div class="" id="containerNav">
    <div class="col-lg-4 col-10">
        <div class="tm-brand-container">
            <div class="tm-brand-texts" id="div_title_nav">
                <h1 class="text-uppercase" id="title_nav"><a href="https://github.com/YFanha/PROJ-Annonces">Web annonces</a></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-2 tm-nav-col">
        <div class="tm-nav">
            <nav class="navbar navbar-expand-lg navbar-light tm-navbar">
                <button
                        class="navbar-toggler btn-primary"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        id="btn_navbarToggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- List navbar---------------------------------------------------------------->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto mr-0" id="list_nav">
                        <li class="nav-item">
                            <div class="tm-nav-link-highlight"></div>
                            <a class="nav-link" href="index.php?action=home"
                            >Home <span class="sr-only">(current)</span></a
                            >
                        </li>
                        <li class="nav-item">
                            <div class="tm-nav-link-highlight"></div>
                            <a class="nav-link" href="index.php?action=displayAnnonces">Annonces</a>
                        </li>
                        <?php if (isset($_SESSION['userEmailAddress']) && isset($_SESSION['id'])) :?>
                        <li class="nav-item">
                            <div class="tm-nav-link-highlight"></div>
                            <a class="nav-link" href="index.php?action=addAnnonces"><ion-icon name="add-circle-outline"></ion-icon></a> <!----------------------->
                        </li>
                        <?php endif;?>
                        <?php if (!isset($_SESSION['userEmailAddress']) || ((@$_GET['action'] == "logout"))) : ?>
                            <li class="nav-item">
                                <div class="tm-nav-link-highlight"></div>
                                <a class="nav-link" href="index.php?action=login">Login</a>
                            </li>
                            <li class="nav-item">
                                <div class="tm-nav-link-highlight"></div>
                                <a class="nav-link" href="index.php?action=register">Register</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <div class="tm-nav-link-highlight"></div>
                                <a class="nav-link" href="index.php?action=logout">Logout</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- END List navbar---------------------------------------------------------------->
            </nav>
        </div>
    </div>
</div>
<div id="content">
<?=$content; ?>
</div>
<!-- Page footer -->
    <!--<footer id="containerFooter">
        <p class="col-12 tm-copyright-text mb-0">
            <a href="https://github.com/YFanha/PROJ-Annonces" id="footer_texte">Projet Web Annonces</a>
            <span id="initiale"><a href="https://github.com/YFanha/PROJ-Annonces" id="footer_texte">YFA - SVY - TSS</a></span>
        </p>
    </footer>-->

</body>
<script src="view/content/js/jquery.min.js"></script>
<script src="view/content/js/parallax.min.js"></script>
<script src="view/content/js/bootstrap.min.js"></script>
<script src="view/content/javaScript/formAnnonce.js"></script>
</html>
