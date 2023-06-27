<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>
<style>
    .reseauSociaux {
        position: relative;
        /*top: 92vh; desktop*/
        top: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 10vh;
        bottom: 2vh;
    }

    /*evenement*/
    @media (min-width: 768px) {
        .logo {

            width: 15%;
        }

        #prison {
            width: 100%;
        }

        .reseauSociaux {

            top: 93vh;
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

        #prison {
            width: 80%;
        }

        .img-home {
            width: 130%;
            margin-top: 0.5vh;
        }

        .reseauSociaux {

            top: 92vh;
        }

        .right {
            margin-right: -1vw;
        }

        .footer .right img {
            width: 30%;

        }

    }
</style>

<div class="titreCentre container">
    <div class="row text-center justify-content-between">
        <div class="col-12 col-md-6">
            <img id="prison" src="../assets/img/prisonds 1.png" alt="prison" class="img-fluid">
        </div>
        <div class="col-12 col-md-6  text-light mb-2">
            <h2 class="text-light">TIME REMAINING</h2>
            <div class="timer d-flex justify-content-center mb-3">
                <label class="text-white" id="jour"></label>
                <label class="text-white" id="heure"></label>
                <label class="text-white" id="min"></label>
                <label class="text-white" id="sec"></label>
            </div>
            <h1 class="text-white mb-2">Titre</h1>
            <p> eius sed architecto neque magni est quam repellat consequatur voluptates. Pariatur eaque perferendis porro vel eum atque.</p>
        </div>
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
    /*variables compte à rebour*/
    var jour = document.getElementById("jour");
    var heure = document.getElementById("heure");
    var min = document.getElementById("min");
    var seconde = document.getElementById("sec");

    function Rebour() {
        var date1 = new Date();
        var date2 = new Date("Jun 31, 2023 00:00:00");
        var sec = (date2 - date1) / 1000;
        var n = 24 * 3600;
        if (sec > 0) {
            j = Math.floor(sec / n);
            h = Math.floor((sec - (j * n)) / 3600);
            mn = Math.floor((sec - ((j * n + h * 3600))) / 60);

            sec = Math.floor(sec - ((j * n + h * 3600 + mn * 60)));

            jour.innerHTML = "" + j + " : ";
            heure.innerHTML = "" + h + "  :";
            min.innerHTML = "" + mn + " : ";
            seconde.innerHTML = "" + sec + " ";

            window.status = "Temps restant : " + j + " j " + h + " h " + mn + " min " + sec + " s ";
        }
        tRebour = setTimeout("Rebour();", 1000);
    }


    Rebour();
</script>


<?php require_once '../inc/footer.inc.php'; ?>