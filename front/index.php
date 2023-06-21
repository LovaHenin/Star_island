<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>

<!--pt-5 padding top 5-->
<!-- mettre en flex puis centrer section avec une classe en plus banner-->
<div class="">
    <div class="row">


        <section id="section1" class="banner d-flex justify-content-center  align-items-center pt-5">

            <!-- ajouter marge y-->
            <div class="container">

                <div class="row">
                    <div class="col-12">

                        <div class=" titre d-flex flex-column justify-content-evenly text-light pt-5">
                            <h1 class="text-white text-center Iceland py-3">BIENVENUE SUR <br>
                                STAR'ISLAND</h1>
                            <p class=>
                                <!--appliquer sur l'autre botton la police predefini dans css btn-lg bouton large-->
                                <!--btn-lg me-5 ajouter un marigin end -->
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto hic aliquam at quidem natus?
                                Deleniti earum quam explicabo, alias, modi error expedita alias, modi error expedita
                                vel eius quam explicabo, alias, modi error expedita quidem adipisci reiciendis, atque quae nulla.
                                quam explicabo, alias, modi error expeditaquam explicabo, alias, modi error expedita


                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <section id="section2" class="banner d-flex justify-content-center  align-items-center pt-5  py-5 ">
            <div class="row">
                <div class=" col-12">
                    <div class="text-center">
                        <div class="card-body">
                            <h1 class="card-title  text-white">BIENVENUE SUR <br>STAR ISLAND</h1>
                            <!--mettre les col texte et image à 6et 6-->
                            <!--ajouter une autre classe si necessaire-->

                            <!--carousel slide w-50 mx-auto 50% et centré -->

                            <div id="carouselExampleCaptions" class="carousel slide w-25 mx-auto">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../assets/img/gta_decors1.jpg" class="d-block w-100" alt="...">

                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/img/teaser.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/img/teaser.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section3" class="banner d-flex justify-content-center  align-items-center pt-5">

            <!-- ajouter marge y-->
            <div class="container my-5 py-5">

                <div class="row">
                    <!--mettre en colonne les enfants et centré-->
                    <div class="col-12 d-flex flex-column align-items-center">
                        <!-- mettre chaque premiere lette en majuscule et la police à Iceland-->

                        <div class=" titre d-flex flex-column justify-content-evenly text-light ">
                            <h1 class="text-white text-center Iceland py-3">BIENVENUE SUR <br>
                                STAR'ISLAND</h1>
                        </div>
                        <!--border border-light w-75 mettre une bordure et reduire la taille à 75%-->
                        <div class="comment d-flex flex-column justify-content-evenly text-light  border border-light w-75">
                            <div class="d-flex  px-4">
                                <div class="top d-flex">
                                    <span>T</span>
                                    <img src="<?= BASE_PATH . 'assets/img/topserveur.png' ?>" alt="" class="ms-3">
                                    <span>P</span>

                                </div>
                                <div class="star">
                                    <p>Star Island</p>
                                    <p>
                                </div>

                            </div>
                            <div class="etoile d-flex justify-content-center my-2  mt-2">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoilenoire.png' ?>" alt="">
                            </div>
                            <form class="d-flex flex-column ">
                                <textarea class="message w-50 mx-auto" id="message" name="message" value="Votre commentaire" rows="4" cols="50"></textarea>
                                <input class="w-20 my-2 mx-auto" type="submit" value="Publier">
                            </form>



                        </div>
                    </div>
                </div>
            </div>

        </section>
        <div class="bas d-flex flex-column justify-content-center  bg-primary">
            <div class="navigation d-flex  justify-content-center">
                <button id="rond1" class="btn btn-circle">O</button>
                <button id="rond2" class="btn btn-circle">O</button>
                <button id="rond3" class="btn btn-circle">O</button>
            </div>
            <div class="reseaux-sociaux">
                <a id="facebook" class="reseaux facebook" href="">
                    <img src="../assets/img/icons8-facebook.png" alt="facebook">
                </a>
                <a id="tiktok" class="reseaux" href="">
                    <img src="../assets/img/Logo_tiktok.png" alt="tiktok">
                </a>
                <a id="twitter" class="reseaux" href="">
                    <img src="../assets/img/icons8-twitter.png" alt="twitter">
                </a>
                <a id="youtube" class="reseaux" href="">
                    <img src="../assets/img/icons8-youtube.png" alt="youtube">
                </a>
                <a id="twitch" class="reseaux" href="">
                    <img src="../assets/img/logo_twitch.png" alt="twitch">
                </a>
                <a id="instagramme" class="reseaux" href="">
                    <img src="../assets/img/logo_Instagram.png" alt="instagramme">
                </a>
                <a id="discorde" class="reseaux" href="">
                    <img src="../assets/img/icons8-discorde.png" alt="discorde">
                </a>
            </div>
        </div>
    </div>

    <section class="row avis d-flex flex-column align-items-center">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 col-md-6 d-flex justify-content-center ">
                    <div class="rep1 bloc d-flex  border border-light">
                        <div class="p-2">
                            <img src="<?= BASE_PATH . 'assets/img/Ellipse56.png' ?>" alt="" class="img-fluid">
                        </div>

                        <div class="ps-2">
                            <div class="d-flex justify-content-around  mt-2">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoilenoire.png' ?>" alt="">
                            </div>
                            <div class="mt-2 text-black">
                                Super serveur GTA RP <br>
                                Publié le 20/06/2023
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div id="rep2" class="rep d-flex border border-light mt">
                        <div class="p-2">
                            <img src="<?= BASE_PATH . 'assets/img/Ellipse56.png' ?>" alt="" class=" img-fluid">
                        </div>
                        <div class="ps-2">
                            <div class="d-flex justify-content-around  mt-2">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoilenoire.png' ?>" alt="">
                            </div>
                            <div class="mt-2 text-black">
                                Super serveur GTA RP <br>
                                Publié le 20/06/2023
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-12 col-md-6 d-flex justify-content-center ">
                    <div id="rep3"  class="rep1 bloc d-flex  border border-light">
                        <div class="p-2">
                            <img src="<?= BASE_PATH . 'assets/img/Ellipse56.png' ?>" alt="" class="img-fluid">
                        </div>

                        <div class="ps-2">
                            <div class="d-flex justify-content-around  mt-2">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoilenoire.png' ?>" alt="">
                            </div>
                            <div class="mt-2 text-black">
                                Super serveur GTA RP <br>
                                Publié le 20/06/2023
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div id="rep4"  class="rep d-flex border border-light">
                        <div class="p-2">
                            <img src="<?= BASE_PATH . 'assets/img/Ellipse56.png' ?>" alt="" class=" img-fluid">
                        </div>
                        <div class="ps-2">
                            <div class="d-flex justify-content-around  mt-2">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                                <img src="<?= BASE_PATH . 'assets/img/etoilenoire.png' ?>" alt="">
                            </div>
                            <div class="mt-2 text-black">
                                Super serveur GTA RP <br>
                                Publié le 20/06/2023
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-12 d-flex justify-content-center mt-5">
                    <div class="comment d-row  flex flex-column justify-content-center text-light  border border-light w-75">

                        <div class="star">
                            <p>VOTRE AVIS NOUS INTERESSE</p>
                            <p>
                        </div>

                        <div class="etoile d-flex justify-content-center my-2  mt-2">
                            <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                            <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                            <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                            <img src="<?= BASE_PATH . 'assets/img/etoileJaune.png' ?>" alt="">
                            <img src="<?= BASE_PATH . 'assets/img/etoilenoire.png' ?>" alt="">
                        </div>
                        <form class="d-flex flex-column ">
                            <textarea class="message w-50 mx-auto" id="message" name="message" value="Votre commentaire" rows="4" cols="50"></textarea>
                            <input class="w-20 my-2 mx-auto" type="submit" value="Publier">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>




<?php require_once '../inc/footer.inc.php'; ?>