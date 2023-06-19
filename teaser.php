<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teaser</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css"
        integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/teaser.css">
</head>

<body>
    

<main class="min-vh-100 d-flex  flex-column justify-content-around">
        <!-- min-vh-100 couvre le body -->



        <div class="entete">

            <img src="assets/img/starisland.png" alt="logo">
            <audio id="myAudio" src="assets/son/audio.mp3"></audio>

            <button id="playButton" onclick="toggleAudio()">
                <img id="playIcon" src="assets/img/haut-parleur.png" alt="Play">
                <img id="pauseIcon" src="pause.png" alt="Pause">
            </button>



            <div class="titre">
                <h1>Star Island</h1>
                <p>Plongez dans l'univers captivant de Star'Island, un serveur de jeu gratuit et en mode freetoplay!
                    Rejoignez une communauté passionnée et vivez des aventures palpitantes dans un monde inspiré de
                    GTA 5. Bienvenue dans l'univers de Star'Island, où le divertissement et l'action ne connaissent
                    aucune limite</p>
            </div>
        </div>
        <div class="affiche">
            <label class="text-white" id="jour"></label>
            <label class="text-white" id="heure"></label>
            <label class="text-white" id="min"></label>
            <label class="text-white" id="sec"></label>

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

    </main>
    <script src="assets/js/teaser.js"></script>
    </body>

</html>