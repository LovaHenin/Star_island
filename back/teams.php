<?php require_once '../config/function.php';

$roles = array(
    "r1" => "Admins",
    "r2" => "Staff/Modos",
    "r3" => "Développeurs",
    "r4" => "Mappers",
    "r5" => "Helpers"

);










// contenues de la table media_type pour affichage dans le select
$medias_type = execute("SELECT*FROM media_type ")->fetchAll(PDO::FETCH_ASSOC);
//debug($medias_type);














require_once '../inc/backheader.inc.php';
?>

<h1 class="d-flex justify-content-center">Teams</h1>
<form action="" method="post" class="w-50 mx-auto mt-5 mb-5">

    <div class="mb-3">
        <small class="text-danger">*</small>
        <label for="" class="form-label">Nom</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre nom">
    </div>

    <div class="mb-3">
        <small class="text-danger">*</small>
        <label for="role_team" class="form-label">Role</label>
        <select id="selection" class="form-control w-25" name="Select_id_media_type" onchange="toggleField()">
            <option selected>Choisir un role</option>
            <?php foreach ($roles as $cle => $role) : ?>

                <option value="<?= $cle ?>"><?= $role ?> </option>

            <?php endforeach; ?>
        </select>

        </select>

    </div>



    <div class="form-group mb-3" id="title_media_file">
        <small class="text-danger">*</small>
        <label for="title_media" class="form-label">Choisir un avatar</label>
        <!-- avec loaadfile =>ajouter enctype dans form-->
        <input onchange="loadFile()" name="title_media" type="file" class="form-control" id="title_media">
        <small class="text-danger"><?= $picture ?? ''; ?></small>
        <div class="text-center">
            <img id="image" class="w-25 rounded mt-3 rounded-circle " alt="">
        </div>
    </div>

    <h2>Liens</h2>
    <div class="mb-3">
        <label>
            <input type="checkbox" name="checkboxDiscord" onclick="afficherChampText()"> Discord
        </label>

        <div id="discordDiv" style="display: none;">
            <input type="text" class="w-50" name="lienDiscord" id="lienDiscord">
        </div>
    </div>

    <div class="mb-3">
        <label>
            <input type="checkbox" name="checkboxFacebook" onclick="afficherChampText()"> Facebook
        </label>

        <div id="facebookDiv" style="display: none;">
            <input type="text" class="w-50" name="lienFacebook" id="lienFacebook">
        </div>
    </div>

    <div class="mb-3">
        <label>
            <input type="checkbox" name="checkboxTwitter" onclick="afficherChampText()"> Twitter
        </label>

        <div id="twitterDiv" style="display: none;">
            <input type="text" class="w-50" name="lienTwitter" id="lienTwitter">
        </div>
    </div>

    <div class="mb-3">
        <label>
            <input type="checkbox" name="checkboxTiktok" onclick="afficherChampText()"> Tiktok
        </label>

        <div id="tiktokDiv" style="display: none;">
            <input type="text" class="w-50" name="lienTiktok" id="lienTiktok">
        </div>
    </div>

    <div class="mb-3">
        <label>
            <input type="checkbox" name="checkboxYoutube" onclick="afficherChampText()"> Youtube
        </label>

        <div id="youtubeDiv" style="display: none;">
            <input type="text" class="w-50" name="lienYoutube" id="lienYoutube">
        </div>
    </div>

    <div class="mb-3">
        <label>
            <input type="checkbox" name="checkboxInstagram" onclick="afficherChampText()"> Instagram
        </label>

        <div id="instagramDiv" style="display: none;">
            <input type="text" class="w-50" name="lienInstagram" id="lienInstagram">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>

</form>


<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Role</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>


        <tr>
            <td><?php ?></td>
            <td><?Php ?></td>
            <td>

            <table class="table table-dark table-striped  mx-auto">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Liens</th>
             <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>


            <tr>
                <td><?php ?></td>
                <td><?php ?></td>
              
                <td>
                  
                    <a href="?id=<?= $media['id_media']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                </td>
            </tr>
      
    </tbody>
</table>






            </td>
            <td>

                <a href="#" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

            </td>
        </tr>

    </tbody>
</table>






<script>
    function afficherChampText() {
        var checkboxDiscord = document.getElementsByName("checkboxDiscord")[0];
        var discordDiv = document.getElementById("discordDiv");

        var checkboxFacebook = document.getElementsByName("checkboxFacebook")[0];
        var facebookDiv = document.getElementById("facebookDiv");


        var checkboxTwitter = document.getElementsByName("checkboxTwitter")[0];
        var twitterDiv = document.getElementById("twitterDiv");

        var checkboxTiktok = document.getElementsByName("checkboxTiktok")[0];
        var tiktokDiv = document.getElementById("tiktokDiv");

        var checkboxYoutube = document.getElementsByName("checkboxYoutube")[0];
        var youtubeDiv = document.getElementById("youtubeDiv");

        var checkboxInstagram = document.getElementsByName("checkboxInstagram")[0];
        var instagramDiv = document.getElementById("instagramDiv");

        if (checkboxDiscord.checked) {
            discordDiv.style.display = "block";
        } else {
            discordDiv.style.display = "none";
        }

        if (checkboxFacebook.checked) {
            facebookDiv.style.display = "block";
        } else {
            facebookDiv.style.display = "none";
        }

        if (checkboxTwitter.checked) {
            twitterDiv.style.display = "block";
        } else {
            twitterDiv.style.display = "none";
        }

        if (checkboxTiktok.checked) {
            tiktokDiv.style.display = "block";
        } else {
            tiktokDiv.style.display = "none";
        }

        if (checkboxInstagram.checked) {
            instagramDiv.style.display = "block";
        } else {
            instagramDiv.style.display = "none";
        }

        if (checkboxYoutube.checked) {
            youtubeDiv.style.display = "block";
        } else {
            youtubeDiv.style.display = "none";
        }
    }
</script>
<?php require_once '../inc/backfooter.inc.php';     ?>