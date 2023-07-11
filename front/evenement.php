<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';

$event = execute(
    "
    SELECT *
    FROM event e
    INNER JOIN event_media em
    ON e.id_event=em.id_event
    INNER JOIN media m
    ON em.id_media=m.id_media
    INNER JOIN event_content ec
    ON e.id_event = ec.id_event
    INNER JOIN content c
    ON ec.id_content=c.id_content
    WHERE e.id_event=:id_event",

    array(
        ':id_event' => '10'//$_GET['id']
    )
  
  )->fetch(PDO::FETCH_ASSOC);

  

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
        #countdown {
      font-size: 24px;
      font-weight: bold;
    }
    }
</style>

<div class="titreCentre container">
    <div class="row text-center justify-content-between">
        <div class="col-12 col-md-6">
        <img width="400" src="<?= '../assets/' . $event['title_media']; ?>" alt="<?= $event['title_content']; ?>">
        </div>
        <div class="col-12 col-md-6  text-light mb-2">
            <h2 class="text-light">TIME REMAINING</h2>
            <div id="countdown"></div>
            <div class="timer d-flex justify-content-center mb-3">
                <label class="text-white" id="jour"></label>
                <label class="text-white" id="heure"></label>
                <label class="text-white" id="min"></label>
                <label class="text-white" id="sec"></label>
            </div>
            <h1 class="text-white mb-2"><?= $event['title_content']; ?></h1>
            <h3> Du :<?= date("Y-m-d", strtotime($event['start_date_event']) ); ?> Au :<?= date("Y-m-d", strtotime($event['end_date_event']) ); ?>  </h3>
            <p><?= $event['description_content']; ?></p>
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
 // Date de départ (au format "année-mois-jour heure:minute:seconde")
 var dateDepart = new Date("2023-07-31T23:59:59");

// Fonction pour mettre à jour le compte à rebours
function mettreAJourCompteARebours() {
  // Date et heure actuelles
  var maintenant = new Date();

  // Calcul du temps restant en millisecondes
  var tempsRestant = dateDepart - maintenant;

  // Vérifier si le compte à rebours est terminé
  if (tempsRestant <= 0) {
    document.getElementById("countdown").innerHTML = "Compte à rebours terminé !";
  } else {
    // Calculer les jours, heures, minutes et secondes restantes
    var jours = Math.floor(tempsRestant / (1000 * 60 * 60 * 24));
    var heures = Math.floor((tempsRestant % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((tempsRestant % (1000 * 60 * 60)) / (1000 * 60));
    var secondes = Math.floor((tempsRestant % (1000 * 60)) / 1000);

    // Afficher le compte à rebours dans l'élément div avec l'id "countdown"
    document.getElementById("countdown").innerHTML = jours + "j :" + heures + "h :" + minutes + "m :" + secondes + "s";
  }
}

// Mettre à jour le compte à rebours toutes les secondes
setInterval(mettreAJourCompteARebours, 1000);


    Rebour();
</script>


<?php require_once '../inc/footer.inc.php'; ?>