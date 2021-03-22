<?php
/**
 * @file      home.php
 * @brief     This view is designed to display the home page
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

ob_start();
$title = "Accueil";
require_once "model/annoncesManager.php";

$annonces = getAnnonces();
$nbAnnonce = intval(count($annonces));

?>
    <!--<section class="row tm-pt-4 tm-pb-6">
        <div class="col-12 tm-page-cols-container">
            <div class="tm-page-col-right">
                <h2 class="tm-text-secondary tm-mb-5">
                    Nunc tristique velit ut semper
                </h2>
                <p class="tm-mb-6">
                    Homepage main photo is provided by <strong>Moose Photos</strong> from <strong>Pexels</strong>. Next Level CSS Template is brought to you by Template Mo website. You can feel free to adapt it for your websites. No need to put a footer credit link. Please kindly spread a word about us. Thank you. If you have any question, feel free to contact us on Facebook page.

                </p>
                <p class="mb-0">
                    Nullam nec dictum dolor. Sed ultricies purus nec suscipit vulputate. Fusce a massa eu orci
                    vulputate varius. Praesent id felis ac erat elementum condimentum. Pellentesque a
                    libero vitae nisi vestibulum tempor vitae vitae nulla. Praesent ut
                    eleifend ligula, nec pretium erat.
                </p>
            </div>
        </div>
    </section>


    <div class="tm-page-col-right">
        <div class="row tm-pt-7 tm-pb-6">
            <div class="col-md-6 tm-home-section-2-left">
                <div
                        class="img-fluid tm-mb-4 tm-small-parallax"
                        data-parallax="scroll"
                        data-image-src="view/content/img/image-1.jpg"></div>
                <div>
                    <h3 class="tm-text-secondary tm-mb-4">
                        Quisque at rutrum felis
                    </h3>
                    <p class="tm-mb-5">
                        Photo by CoWomen from Pexels. Morbi sollicitudin nibh eu
                        dignissim mollis. Etiam turpis tortor, ultricies sit amet
                        placerat suscipit, auctor eu diam.
                    </p>
                    <ul class="tm-list-plus">
                        <li>Vestibulum finibus consectetur nulla</li>
                        <li>Eget imperdiet eros interdum sit amet</li>
                        <li>Sed a lacinia lorem, sed luctus enim</li>
                        <li>2 small images has a parallax effect</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 tm-home-section-2-right">
                <div
                        class="img-fluid tm-mb-4 tm-small-parallax"
                        data-parallax="scroll"
                        data-image-src="view/content/img/image-2.jpg"></div>
                <div>
                    <h3 class="tm-text-secondary tm-mb-4">
                        Sed ultricies tortor vitae
                    </h3>
                    <p class="tm-section-2-text">
                        Photo by <strong>CoWomen</strong> from <strong>Pexels</strong>. Quisque tortor justo, pharetra in
                        eros sed, accumsan dapibus dolor. In luctus sed ante a
                        tristique.
                    </p>
                    <p>
                        You cannot re-distribute our template on your website for download. Ut ornare pulvinar lorem a elementum. Cras sollicitudin ante velit, eget facilisis sem viverra nex. Etiam quis mattis urna.
                    </p>
                </div>
            </div>
        </div>
    </div>-->
    <!-- row -->

    <!-- Call to Action -->
    <!--<section class="row" id="tmCallToAction">
        <div class="col-12 tm-page-cols-container tm-call-to-action-col">
            <div class="tm-page-col-right">
                <div class="tm-call-to-action-box">
                    <i class="fas fa-3x fa-rss-square tm-call-to-action-icon"></i>
                    <div class="tm-call-to-action-text">
                        <h3 class="tm-call-to-action-title">
                            Vivamus sollicitudin tellus
                        </h3>
                        <p class="tm-call-to-action-description">
                            Maecenas maximus tellus in dolor auctor tristique. Nam
                            hendrerit posuere laoreet. Aliquam erat volutpat. Nulla eros
                            est, imperdiet vel feugiat non, ullamcorper mattis nulla.
                        </p>
                        <form action="#" method="GET" class="tm-call-to-action-form">
                            <input type="email" name="email" placeholder="Email" class="tm-email-input" required />
                            <button type="submit" class="btn btn-primary">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<div class="bienvenu">
    <h1>Bienvenue</h1>
</div>

<div class="descriptionHome">
    Nous travaillons sur un projet dans le cadre du CPNV. Nous devons réaliser un site web permettant à des membre authentifié de publier des annonces pour vendre des articles, mettre en location, ou proposer des services, avec comme "base de données" des fichiers JSON.
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="data/img/annonces/1615792337.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="data/img/annonces/1615799876.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="data/img/annonces/1615802691.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<?php
$content = ob_get_clean();
require "gabarit.php";
?>
