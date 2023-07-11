<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';




// recuperer contenu_vip dans content 
$contenu_vip = execute(
  "
  SELECT description_content
  FROM content
 WHERE title_content=:title_content",
  array(
      ':title_content' => 'vip'
  )

)->fetch(PDO::FETCH_ASSOC);

// recuperer contenu_vip+ dans content 
$contenu_vip_plus = execute(
  "
  SELECT description_content
  FROM content
 WHERE title_content=:title_content",
  array(
      ':title_content' => 'vip+'
  )

)->fetch(PDO::FETCH_ASSOC);
?>
<style>
  .reseauSociaux {
    position: relative;
    /*top: 92vh; desktop*/
    top: 3vh;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 10vh;
    bottom: 2vh;
  }

  h2 {
    color: orangered;
    text-decoration: underline;
  }

  .image-container {
    max-width: 100%;
    height: auto;
    text-align: center;
  }

  /*vip*/
  @media (min-width: 768px) {
    .logo {

      width: 15%;
    }

    #vipG {
      width: 80%;
      top: 30vh;
    }

    .reseauSociaux {

      top: 11vh;
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

    #vipG {
      width: 65%;
      top: 10vh;
    }

    .img-home {
            width: 130%;
            margin-top: 0.5vh;
        }
    .reseauSociaux {

      top: 15vh;
    }

    .right {
      margin-right: -1vw;
    }

    .footer .right img {
      width: 30%;

    }

  }
</style>

<div class="titre-page">
  <!--text-truncate pour ajuster ou tronquer h1 pour ne pas passer à la ligne-->
  <h1 class="text-light text-truncate">DEVENIR VIP</h1>
</div>

<div class="container" style="margin-top: 250px;">

  <div class="row text-center justify-content-between">


    <div class="col-12 col-md-4">
      <img id="vipG" src="../assets/img/Group5M.png" alt="personnage" class="img-fluid">
    </div>

    <div class="col-12 col-md-4 text-light">
      <h2>VIP</h2>
      <p> <?= $contenu_vip['description_content']; ?></p>
      <h2>VIP+</h2>
      <p> <?= $contenu_vip_plus['description_content']; ?></p>
    </div>

    <div class="col-12 col-md-4">
      <img id="vipD" src="../assets/img/Group 6.png" alt="personnage" class="img-fluid">
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









<?php require_once '../inc/footer.inc.php'; ?>