<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>
<style>
  .reseauSociaux {
    position: relative;
    /*top: 92vh; desktop*/
    top: 35vh;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 10vh;
    bottom: 2vh;
  }

  /*Galérie*/

  @media (min-width: 768px) {
    .logo {

      width: 15%;
    }

    .body {
      overflow: hidden;
    }

    .img-home {
      width: 8%;
      margin-top: 3vh;
    }

    .right {
      /*auto desktop*/
      margin-right: -2vw;
    }

    .reseauSociaux {

      top: 41vh;
    }

    .footer .right img {
      width: 30%;

    }

  }

  @media (min-width: 1200px) {
    .logo {

      width: 10%;
    }

    #slider {
      width: 40%;
      height: 22vw;

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

      top: 10vh;
    }

    .footer .right img {
      width: 30%;

    }

  }
</style>
<div class="galerie">
  <!--<div class="row"> -->

  <div class="titre-page">
    <h1 class="text-light">GALERIE</h1>
  </div>





  <section id="slider">

    <input type="radio" name="slider" id="s1" checked>
    <input type="radio" name="slider" id="s2">
    <input type="radio" name="slider" id="s3">
    <input type="radio" name="slider" id="s4">
    <input type="radio" name="slider" id="s5">

    <?php
    $galeries = execute(
      "
      SELECT m.title_media
      FROM media m
      INNER JOIN media_type mt
      ON m.id_media_type=mt.id_media_type
      WHERE (mt.title_media_type='galerie')"
      
  )->fetchAll(PDO::FETCH_ASSOC);


    //[
    //   "../assets/img/gta_decors1.jpg",
    //   "../assets/img/predation2.png",
    //   "../assets/img/prison.jpg",
    //   "../assets/img/teaser.jpg",
    //   "../assets/img/gta_decors2 2.png"
    // ];

    for ($i = 0; $i < count($galeries); $i++) {
      $slideNumber = $i + 1;
      $inputId = "s" . $slideNumber;
      $labelId = "slide" . $slideNumber;
      $imagePath = $galeries[$i]['title_media'];
    ?>

      <label for="<?php echo $inputId; ?>" id="<?php echo $labelId; ?>">
        <img src="<?php echo $imagePath; ?>" alt="">
      </label>

    <?php } ?>
  </section>


  <!-- 
  </div>-->

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
<?php require_once '../inc/footer.inc.php'; ?>