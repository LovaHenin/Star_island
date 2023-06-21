<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>

<div class="titre-page">
  <h1 class="text-light">GALERIE</h1>
</div>
<section id="slider">

  <input type="radio" name="slider" id="s1" checked>
  <input type="radio" name="slider" id="s2">
  <input type="radio" name="slider" id="s3">
  <input type="radio" name="slider" id="s4">
  <input type="radio" name="slider" id="s5">

  <label for="s1" id="slide1"><img src="../assets/img/gta_decors1.jpg" alt=""></label>
  <label for="s2" id="slide2"><img src="../assets/img/predation2.png"></label>
  <label for="s3" id="slide3"><img src="../assets/img/prison.jpg" alt=""></label>
  <label for="s4" id="slide4"><img src="../assets/img/teaser.jpg" alt=""></label>
  <label for="s5" id="slide5"><img src="../assets/img/gta_decors2 2.png" alt=""></label>
</section>


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






<?php require_once '../inc/footer.inc.php'; ?>