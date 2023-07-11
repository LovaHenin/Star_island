<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';

if (!empty($_POST)) {
    $error = false;
    if (empty($_POST['rating_comment'])) {
        $rating = 0;
    }

    if (empty($_POST['comment_text'])) {
        $error = true;


        $message_Comment = 'Commentaire obligatoire';
    }

    if (empty($_POST['nickname_comment'])) {
        $error = true;
        $message_nickname = 'ce champ est obligatoire';
    }

    if (!$error) {

        // liste des avatars
        $medias_images_avatar = execute("SELECT * FROM media m INNER JOIN media_type mt ON m.id_media_type=mt.id_media_type where mt.title_media_type = :avatars", array(
            ':avatars' => 'Avatars'
        ))->fetchAll(PDO::FETCH_ASSOC);
        $randomizeAvatar = rand(0, count($medias_images_avatar) - 1);
        // debug($medias_images_avatar[$randomizeAvatar]['id_media']);

        // Ajouter un contenu
        $success = execute("INSERT INTO comment (rating_comment , comment_text, publish_date_comment, nickname_comment,id_media ) VALUES (:rating_comment , :comment_text, :publish_date_comment, :nickname_comment,:id_media)", array(
            ':rating_comment' => $_POST['rating_comment'],
            ':comment_text' => $_POST['comment_text'],
            ':publish_date_comment' => date("Y-m-d H:i:s"),
            ':nickname_comment' => $_POST['nickname_comment'],
            ':id_media' =>  $medias_images_avatar[$randomizeAvatar]['id_media'],
        ));

        if ($success) {
            $_SESSION['messages']['success'][] = 'Nouveau contenu ajouté.';
        } else {
            $_SESSION['messages']['danger'][] = 'Problème de traitement';
        }

        header('location:./index.php');
        exit();
    }
}
// recuperer toutes les contents 
$listes_content = execute("
SELECT c.title_content, p.title_page,c.description_content,c.id_content
FROM content c
INNER JOIN page p
ON c.id_page= p.id_page
")->fetchAll(PDO::FETCH_ASSOC);

//debug($listes_content);

// recuperer titre_home pour index home
$titre_home = execute(
    "
    SELECT description_content
    FROM content
   WHERE title_content=:title_content",
    array(
        ':title_content' => 'titre_home'
    )

)->fetch(PDO::FETCH_ASSOC);

// recuperer contenu_home 1 index section1
$contenu_home1 = execute(
    "
    SELECT description_content
    FROM content
   WHERE title_content=:title_content",
    array(
        ':title_content' => 'contenu_home1'
    )

)->fetch(PDO::FETCH_ASSOC);

// recuperer les images du galerie
$galeries = execute(
    " SELECT m.title_media,m.name_media
    FROM media m
    INNER JOIN media_type mt
    ON m.id_media_type=mt.id_media_type
    WHERE mt.title_media_type=:title_media_type",
    array(
        ':title_media_type' => 'galerie'
    )

)->fetchAll(PDO::FETCH_ASSOC);

$comments = execute(
    "
    SELECT m.title_media,m.name_media,c.rating_comment,c.comment_text,c.publish_date_comment,c.id_comment,c.nickname_comment,c.activate
    FROM media m
    INNER JOIN comment c
    ON m.id_media=c.id_media
   "

)->fetchAll(PDO::FETCH_ASSOC);

//debug($comments);

?>

<style>
    .bas {
        position: relative;
    }

    .reseauSociaux {
        position: relative;
        /*top: 92vh; desktop*/
        top: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 10vh;
        bottom: 2vh;
    }

    /*index*/
    @media (min-width: 768px) {


        .top img {
            height: 60%;
            margin-right: 5%;
        }

        /*T et P du TOP*/
        .top span {
            color: orangered;
            font-weight: bold;
            font-size: 2rem;
        }

        .top h1 {
            margin-left: 10px;
        }

        .star {

            font-size: 2rem;
            left: 3rem;
            position: relative;

        }

        .titre_sec3 {
            top: 15vh;
        }

        .logo {

            width: 15%;
        }


        #carouselExampleCaptions {
            width: 75%;
        }


        .reseauSociaux {

            top: 58vh;
        }

        .right {
            margin-right: -4vw;
        }

        .footer .right img {
            width: 30%;

        }

    }

    @media (min-width: 1200px) {
        .logo {

            width: 10%;
        }

        #carouselExampleCaptions {
            width: 40%;
        }

        .star {


            left: 17rem;

        }

        .contenu {
            font-size: 1.3rem;
        }

        .img-home {
            width: 130%;
            margin-top: 0.5vh;
        }

        .reseauSociaux {

            top: 90vh;
        }

        .right {
            margin-right: -1vw;
        }

        .footer .right img {
            width: 30%;

        }

    }
</style>

<!--pt-5 padding top 5-->
<!-- mettre en flex puis centrer section avec une classe en plus banner-->
<div class="home">
    <div class="row">

        <section id="section1" class=" banner d-flex justify-content-center  align-items-center ">

            <!-- ajouter marge y-->
            <div class="container">

                <div class="row">
                    <div class="col-12">

                        <div class=" d-flex flex-column justify-content-evenly text-light ">
                            <h1 class="text-white text-center Iceland py-3"><?= $titre_home['description_content']; ?></h1>
                            <p class="contenu">
                                <!--appliquer sur l'autre botton la police predefini dans css btn-lg bouton large-->
                                <!--btn-lg me-5 ajouter un marigin end -->
                                <?= $contenu_home1['description_content']; ?>


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
                            <h1 class="card-title  text-white"><?= $titre_home['description_content']; ?></h1>
                            <!--mettre les col texte et image à 6et 6-->
                            <!--ajouter une autre classe si necessaire-->


                            <!--carousel slide w-50 mx-auto 50% et centré -->

                            <div id="carouselExampleCaptions" class="carousel slide  mx-auto">
                                <div class="carousel-indicators">
                                    <?php foreach ($galeries as $key => $galerie) { 
                                        ?>
                                        
                                         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key; ?>" <?php if($key == 0){echo "class='active'";} ?>></button>
                                    <?php } ?>
                                </div>
                                <div class="carousel-inner">
                                    <?php foreach ($galeries as $key => $galerie) {?>
                                        <div class="carousel-item <?php if($key == 0){echo 'active';} ?>">
                                        <img class="d-block w-100"  src="<?= '../assets/' . $galerie['title_media']; ?>" alt="<?= $galerie['name_media']  ?>">
                                    </div>
                                <?php  } ?>
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
                            <h1 class="titre_sec3 text-center Iceland "><?= $titre_home['description_content']; ?></h1>
                        </div>
                        <!--border border-light w-75 mettre une bordure et reduire la taille à 75%-->
                        <div class="comment d-flex flex-column justify-content-evenly text-light  border border-light w-75">
                            <div class="d-flex m-3">
                                <div class="top d-flex justify-content-center">
                                    <span>T</span>
                                    <img src="<?= BASE_PATH . 'assets/img/topserveur.png' ?>" alt="" class="">
                                    <span>P</span>

                                </div>
                                <div class="star">
                                    <p>Star Island</p>

                                </div>

                            </div>
                            <div class="etoile d-flex justify-content-center">
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

        <div class="bas d-flex flex-column justify-content-center">
            <div class="navigation d-flex  justify-content-center">
                <button id="rond1" class="btn btn-circle">O</button>
                <button id="rond2" class="btn btn-circle">O</button>
                <button id="rond3" class="btn btn-circle">O</button>
            </div>
            <div class="reseauSociaux">

                <div class="box">
                    <input type="checkbox" id="checkbox">
                    <!--checkbox-->
                    <!--Menu-->
                    <div class="menu">
                        <a href="#">
                            <div class="menuItems">
                                <i class="fab fa-whatsapp"></i>

                            </div>

                        </a>
                        <a href="#">
                            <div class="menuItems">
                                <i class="fab fa-instagram"></i>

                            </div>

                        </a>

                        <a href="#">
                            <div class="menuItems">
                                <i class="fab fa-facebook"></i>

                            </div>

                        </a>
                        <a href="#">
                            <div class="menuItems">
                                <i class="fab fa-twitter"></i>

                            </div>

                        </a>
                        <a href="#">
                            <div class="menuItems">
                                <i class="fab fa-discord"></i>

                            </div>

                        </a>
                        <a href="#">
                            <div class="menuItems">
                                <i class="fab fa-linkedin"></i>

                            </div>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Avis-->
    <section class="row avis d-flex flex-column align-items-center">

        <div class="container">

            <div class="row mb-5">
                <?php foreach ($comments as $comment) : ?>
                    <div class="col-12 col-md-6 d-flex justify-content-center ">

                        <div class=" w-100 rep1 bloc d-flex  border border-light">
                            <div class="p-2">
                                <img width="90" src="<?= '../assets/' . $comment['title_media']; ?>" alt="<?= $comment['name_media']  ?>" class="img-fluid">
                            </div>

                            <div class="ps-2">
                                <div class="star-rating " colspan="2">
                                    <?php
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($i < $comment['rating_comment']) {
                                            echo "<i class='fas fa-star  text-warning'></i>";
                                        } else {
                                            echo "<i class='fas fa-star text-secondary'></i>";
                                        }
                                    }

                                    ?>

                                </div>
                                <div class="mt-2 text-white">
                                    <?= $comment['comment_text']; ?><br>
                                    Publié le : <?= $comment['publish_date_comment']; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                <div class="row mb-5 w-75 my-2 mx-auto">
                    <form class="d-flex flex-column border bg-white bg-opacity-25 px-5 my-5 rounded" method="post" enctype="multipart/form-data">
                        <h4 class="text-center py-3 text-white">Votre avis nous intéresse</h4>

                        <div class="d-flex justify-content-around mb-3 px-5">
                            <i class="fas fa-star fa-2x star-avis"></i>
                            <i class="fas fa-star fa-2x star-avis"></i>
                            <i class="fas fa-star fa-2x star-avis"></i>
                            <i class="fas fa-star fa-2x star-avis"></i>
                            <i class="fas fa-star fa-2x star-avis"></i>
                        </div>
                        <input type="text" name="nickname_comment" class="form-control w-25 my-2 mx-auto" id="nickname_comment" placeholder="Pseudo">
                        <small class="bg-white bg-opacity-75 text-danger p-2 mb-3"><?= $message_nickname ?? ""; ?></small>
                        <textarea name="comment_text" id="comment_text" cols="10" rows="5" class="bg-white bg-opacity-25" placeholder="Commentaires"></textarea>
                        <small class="bg-white bg-opacity-75 text-danger p-2 mb-3"><?= $message_Comment  ?? ""; ?></small>
                        <input type="hidden" name="rating_comment" id="rating_comment">
                        <button type="submit" class="btn btn-light w-25 mb-3  my-2 mx-auto">Publier</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        /* variables index rond*/
        const section1 = document.getElementById("section1");
        const button1 = document.getElementById("rond1");
        const section2 = document.getElementById("section2");
        const button2 = document.getElementById("rond2");
        const section3 = document.getElementById("section3");
        const button3 = document.getElementById("rond3");


        button1.addEventListener("click", function() {


            section1.style.opacity = "1";

            button1.style.color = "white";
            section3.style.opacity = "0";
            section2.style.opacity = "0";
            button2.style.color = "red";
            button3.style.color = "red";


        });


        button2.addEventListener("click", function() {



            section2.style.opacity = "1";

            button2.style.color = "white";
            section1.style.opacity = "0";
            section3.style.opacity = "0";

            button1.style.color = "red";
            button3.style.color = "red";

        });
        button3.addEventListener("click", function() {

            section3.style.opacity = "1";

            button3.style.color = "white";
            section1.style.opacity = "0";
            section2.style.opacity = "0";
            button1.style.color = "red";
            button2.style.color = "red";

        });

        // Gestion des étoiles dans "votre avis nous interesse"
        const stars = document.querySelectorAll(".fas.fa-star.star-avis");
        for (let index = 0; index < stars.length; index++) {
            stars[index].classList.add('text-dark');

            stars[index].addEventListener('click', () => {
                for (let i = 0; i < stars.length; i++) {
                    if (i <= index) {
                        stars[i].classList.remove('text-dark');
                        stars[i].classList.add('text-warning');
                        document.getElementById('rating_comment').value = i + 1;
                    } else {
                        stars[i].classList.remove('text-warning');
                        stars[i].classList.add('text-dark');
                    }
                }
            });
        }
    });
</script>

<?php require_once '../inc/footer.inc.php'; ?>