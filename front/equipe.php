<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>
<style>
    /* -----------Reseaux sociaux------------*/

    .avatar {
        width: 8vh;
    }

    .reseauSociaux {
        position: relative;
        /*top: 92vh; desktop*/
        top: 89vh;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 10vh;
        bottom: 2vh;
    }




    .hidden {
        display: none;
    }

    .extension {
        position: absolute;
        top: 0;
        /* display: none; */
        /* Autres styles de positionnement */
    }


    /*Equipe*/
    @media (min-width: 768px) {
        .logo {

            width: 15%;
        }

        .img-home {
            margin-top: 4vh;
            width: 10%
        }

        #vipG {
            position: relative;
            width: 80%;

        }

        .reseauSociaux {

            top: 93vh;
        }

        .footer .right img {
            width: 30%;

        }

    }

    @media (min-width: 1200px) {
        .logo {

            width: 10%;
        }

        .avatar {
            width: auto;
        }

        .img-home {
            width: 130%;
            margin-top: 0.5vh;
        }

        .right {
            /*auto desktop*/
            margin-right: -2vw;
        }

        .reseauSociaux {

            top: 92vh;
        }

        .footer .right img {
            width: 30%;

        }

    }
</style>


<div class="titre-page">
    <h1 class="text-light">L'EQUIPE</h1>
</div>
<!--col-lg-2 chaque colonne aura une largeur de 2 colonnes sur les écrans de largeur large (≥1200px), col-md-4 une largeur de 4 colonnes sur les écrans de taille moyenne (≥768px) et la classe col-6 une largeur de 6 colonnes sur les écrans de petite taille (<768px).-->

<div class="titreCentre container">
    <div class="row border mb-5">
        <div class="col-lg-2 col-md-4 col-6 border">
            <a class="text-light " href="#">Tous</a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 border">
            <a class="text-light " href="#">Admins</a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 border">
            <a class="text-light " href="#">Staff/Modos</a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 border">
            <a class="text-light " href="#">Développeurs</a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 border">
            <a class="text-light " href="#">Mappers</a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 border">
            <a class="text-light " href="#">Helpers</a>
        </div>
    </div>

    <?php
    $mainImagesData = [
        [
            'id' => '1',
            'src' => '../assets/img/charmilia6.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-twitter.png', 'alt' => 'Image 3']
            ]
        ],
        [
            'id' => '2',
            'src' => '../assets/img/Souen4.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/icons8-discorde.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2']

            ]
        ],
        [
            'id' => '3',
            'src' => '../assets/img/hans6.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-discorde.png', 'alt' => 'Image 3']
            ]
        ],
        [
            'id' => '4',
            'src' => '../assets/img/charmilia6.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/icons8-facebook.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-twitter.png', 'alt' => 'Image 3']
            ]
        ],
        [
            'id' => '5',
            'src' => '../assets/img/ellios4.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/icons8-discorde.png', 'alt' => 'Image 2']

            ]
        ],
        [
            'id' => '6',
            'src' => '../assets/img/charmilia6.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-twitter.png', 'alt' => 'Image 3']
            ]
        ],
        [
            'id' => '7',
            'src' => '../assets/img/ellios4.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/icons8-discorde.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2']

            ]
        ],
        [
            'id' => '8',
            'src' => '../assets/img/Souen4.png"',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-twitter.png', 'alt' => 'Image 3']
            ]
        ],

        [
            'id' => '9',
            'src' => '../assets/img/charmilia6.png',
            'alt' => 'personnage',
            'role' => 'visiteur',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-twitter.png', 'alt' => 'Image 3']
            ]
        ],
        [
            'id' => '10',
            'src' => '../assets/img/Souen4.png"',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/icons8-discorde.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-twitter.png', 'alt' => 'Image 3']
            ]
        ],
        [
            'id' => '11',
            'src' => '../assets/img/charmilia6.png',
            'alt' => 'personnage',
            'role' => 'Admin',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-discorde.png', 'alt' => 'Image 3']
            ]
        ],
        [
            'id' => '12',
            'src' => '../assets/img/hans6.png',
            'alt' => 'personnage',
            'role' => 'visiteur',
            'extensions' => [
                ['src' => '../assets/img/Logo_tiktok.png', 'alt' => 'Image 1'],
                ['src' => '../assets/img/logo_twitch.png', 'alt' => 'Image 2'],
                ['src' => '../assets/img/icons8-twitter.png', 'alt' => 'Image 3']
            ]
        ],

    ];
    ?>


    <?php $rowCount = 0; ?>
    <div class="row">
        <?php foreach ($mainImagesData as $mainImage) : ?>
            <div class="col-4 col-md-3 col-lg-2">
                <!--img-thumbnail il a un border et bg-->
                <img src="<?= $mainImage['src'] ?>" alt="<?= $mainImage['alt'] ?>" class="avatar img-thumbnail main-image bg-transparent border-0" onclick="showExtension(this.getAttribute('data-id'))" data-id="<?= $mainImage['id'] ?>">
                <p class="text-light"><?= $mainImage['role'] ?></p>
                <div class="extension hidden">
                    <?php foreach ($mainImage['extensions'] as $extension) : ?>
                        <a href=""><img class="img-thumbnail bg-transparent border-0" src="<?= $extension['src'] ?>" alt="<?= $extension['alt'] ?>"></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

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

<script>
    function showExtension(mainImageId) {
        var mainImages = document.getElementsByClassName('main-image');
        var extensionsDiv = document.getElementsByClassName('extension');

        // Masquer toutes les extensions
        for (var i = 0; i < extensionsDiv.length; i++) {
            extensionsDiv[i].classList.add('hidden');
        }

        // Trouver l'index de l'image principale sélectionnée
        var selectedIndex;
        for (var i = 0; i < mainImages.length; i++) {
            if (mainImages[i].getAttribute('data-id') === mainImageId) {
                selectedIndex = i;
                // console.log(i);
                break;
            }
        }

        // Positionner l'extension à droite de l'image principale
        var selectedImage = mainImages[selectedIndex];
        var selectedExtension = extensionsDiv[selectedIndex];
        var leftPosition = selectedImage.offsetLeft + selectedImage.offsetWidth;
        var topPosition = selectedImage.offsetTop;
        selectedExtension.style.left = leftPosition + 'px';
        selectedExtension.style.top = topPosition + 'px';
        //    console.log('left' + selectedExtension.style.left);
        //    console.log('top' + selectedExtension.style.top);
        // Afficher l'extension sélectionnée

        selectedExtension.classList.remove('hidden');
    }
</script>

<?php require_once '../inc/footer.inc.php'; ?>