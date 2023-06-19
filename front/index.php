<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>

<!--pt-5 padding top 5-->
<!-- mettre en flex puis centrer section avec une classe en plus banner-->
<section class="banner d-flex justify-content-center  align-items-center pt-5">

    <!-- ajouter marge y-->
    <div class="container my-5 py-5">

        <div class="row">
            <div class="col-md-12">
                <!-- mettre chaque premiere lette en majuscule et la police à Iceland-->

                <div class="container h-100 d-flex flex-column justify-content-evenly text-light pt-5">
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

<section class="banner d-flex justify-content-center  align-items-center pt-5  py-5 border">
    <div class="row">
        <div class=" col-md-12">
        <div class="text-center">
                    <div class="card-body">
                        <h1 class="card-title  text-white">BIENVENUE SUR <br>STAR ISLAND</h1>
                        <!--mettre les col texte et image à 6et 6-->
                        <!--ajouter une autre classe si necessaire-->
                      
                            <!--carousel slide w-50 mx-auto 50% et centré -->

                            <div id="carouselExampleCaptions" class="carousel slide w-50 mx-auto">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
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
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                       

                    </div>
                </div>
        </div>
    </div>
</section>




<?php require_once '../inc/footer.inc.php';          ?>