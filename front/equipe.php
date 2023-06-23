<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>
<style>
        .hidden {
    display: none;
}

    .extension {
        position: absolute;
        top: 0;
        /* display: none; */
        /* Autres styles de positionnement */
    }
</style>


<div class="titre-page">
    <h1 class="text-light">L'EQUIPE</h1>
</div>




<div class="titreCentre container">

    <div class="row  d-flex">
        <!--pour centrer un col-12-->
        <div class="col-12 mb-2 d-flex justify-content-center">

            <div class=" equipeBloc text-center">
                <a class="text-light" href="#">Tous</a>
            </div>
            <div class="equipeBloc text-center">
                <a class="text-light " href="#">Admins</a>
            </div>
            <div class="equipeBloc text-center">
                <a class="text-light " href="#">Staff/Modos</a>
            </div>
            <div class="equipeBloc text-center">
                <a class="text-light " href="#">Développeurs</a>
            </div>
            <div class="equipeBloc text-center">
                <a class="text-light " href="#">Mappers</a>
            </div>
            <div class="equipeBloc text-center">
                <a class="text-light " href="#">Helpers</a>
            </div>
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
            <div class="col-2">
                <div class="d-flex flex-column">
                    <img src="<?= $mainImage['src'] ?>" alt="<?= $mainImage['alt'] ?>" class="img-fluid w-75 main-image" onclick="showExtension(this.getAttribute('data-id'))" data-id="<?= $mainImage['id'] ?>">
                    <p class="text-light"><?= $mainImage['role'] ?></p>
                    <div class="extension hidden">
                        <?php foreach ($mainImage['extensions'] as $extension) : ?>
                            <a href=""><img src="<?= $extension['src'] ?>" alt="<?= $extension['alt'] ?>"></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php
            $rowCount++;
            if ($rowCount % 6 === 0) : // Ajoute une nouvelle ligne après chaque 6 images
            ?>
    </div>
    <div class="row">
    <?php endif; ?>
<?php endforeach; ?>
    </div>








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