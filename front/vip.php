<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
?>

<div class="titre-page"><h1 class="text-light">DEVENIR VIP</h1></div>

<div class="vip container">
    <!--between semble ne marche pas sans container-->
    <div class="row mb-5 d-flex justify-content-between">
        <div id="vipGauche" class="vipBordure col-12 col-md-4 d-flex  border-4 border-danger ">
         <img id="personnaGauche" src="../assets/img/Perso2-removebg-preview.png" alt="personnage">
        </div>
        <div class="sousvip col-12 col-md-4 d-flex flex-column align-items-center justify-content-center text-light">

            <h2>VIP</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, modi itaque odit sint explicabo animi asperiores, eaque recusandae, suscipit ipsum dicta nulla pariatur quasi odio numquam impedit incidunt ad? Nostrum!</p>
            <h2>VIP+</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid iure non ea neque et exercitationem veritatis commodi accusamus sit id accusantium nam eveniet, laudantium numquam reprehenderit necessitatibus. Hic, eligendi perferendis!</p>
       
        </div>
        <div id="vipDroite" class="vipBordure col-12 col-md-4 d-flex  border-4 border-danger ">
        <img id="personnaDroite"src="../assets/img/Perso1-removebg-preview.png" alt="personnage">
        </div>
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









<?php require_once '../inc/footer.inc.php'; ?>