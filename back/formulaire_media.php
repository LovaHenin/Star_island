<?php require_once '../config/function.php';



// controle de formulaire si input est vide
if (!empty($_POST)) {

    $error = false;


        // input name
    if (empty($_POST['name_media'])) {

        $message_name = 'ce champ est obligatoire';
        $error = true;
    }

    // pour file
    if (empty($_FILES['title_media']['name'])) {
        if( empty($_POST['title_media']) ){
            $picture = 'title media obligatoire';
            $error = true;
        }
       
    } else {
        $picture = '';
        // verifier les formats
        $formats = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/webp'];

        // inarray verifie si le ['picture_profil']['type'] est dans le tableau $formats
        if (!in_array($_FILES['title_media']['type'], $formats)) {
            $picture .= "les formats autorisé sont 'image/png', 'image/jpg','image/jpeg','image/gif','image/webp'<br>";
            $erreur = true;
        }
        // verifier la taille de l'image
        if ($_FILES['title_media']['size'] > 200000000) {
            $picture .= " Taille maximale de autorisée de 20M";
            $erreur = true;
        }
    }

// debug( $_POST['title_media']);
//die;
    if (!$error) { //insert
        // si pas de retour id dans POST=> insert
      
        $picture_bdd = '../assets/upload/' . uniqid() . date_format(new DateTime(), 'd_m_Y_H_i_s') . $_FILES['title_media']['name'];
        //debug($picture_bdd);
        // on la copie dans le dossier upload
        copy($_FILES['title_media']['tmp_name'], $picture_bdd);

        if(isset($variable)) {
        $resultat = execute("INSERT INTO media (title_media,name_media,id_media_type) VALUES (:title_media,:name_media,:id_media_type)", array(
            //condition ternaire
            ':title_media' => !empty($_FILES['title_media']['name']) ? $picture_bdd : $_POST['title_media'],
            ':name_media' => $_POST['name_media'],
            ':id_media_type' => $_POST['Select_id_media_type']

        ), 'lastindex');
        $_SESSION['messages']['success'][] = 'media ajoutée';
        header('location:./formulaire_media.php');
        exit();

    }else{
        $media = execute(

            "SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
            FROM media m
            INNER JOIN media_type mt
            ON m.id_media_type= mt.id_media_type
            WHERE id_content=:id",
            array(
                ':id' => $_GET['variable']//get de link_media
            )
        )->fetch(PDO::FETCH_ASSOC);

      debug("coucou" . $media);
      



    }
    }
} // fin insert & upadate


// contenues de la table media_type pour affichage dans le select
$medias_type = execute("SELECT*FROM media_type ")->fetchAll(PDO::FETCH_ASSOC);
//debug($medias_type);






require_once '../inc/backheader.inc.php';
?>


<form action="" method="post"  class="w-50 mx-auto mt-5 mb-5" enctype="multipart/form-data">

    <legend class="ml-3">MEDIA</legend>


    <div class="form-group w-25">
        <small class="text-danger">*</small>
        <label for="selection">Type de média</label>
        <select id="selection" class="form-control" name="Select_id_media_type" onchange="toggleField()">
            <?php foreach ($medias_type as $media_type) : ?>

                <option value="<?= $media_type['id_media_type'] ?>" <?php if (isset($media['Select_id_media_type']) && $media_type['id_media_type'] ==$variable) {
                                                            echo " selected";
                                                        } ?>> <?= $media_type['title_media_type'] ?> </option>

            <?php endforeach; ?>
        </select>
    </div>




   




    <div class="form-group mb-3">
        <small class="text-danger">*</small>
        <label for="titre">Name(ALT)</label>
        <input name="name_media" type="text" class="form-control w-75" id="name_media" placeholder="Entrez le nom" value="">
        <small class="text-danger"> <?= $message_name ?? ''; ?></small>
    </div>
    <div class="form-group mb-3" id="title_media_file">
        <small class="text-danger">*</small>
        <label for="title_media" class="form-label">Title</label>
         <!-- avec loaadfile =>ajouter enctype dans form-->
        <input onchange="loadFile()" name="title_media" type="file" class="form-control" id="title_media">
        <small class="text-danger"><?= $picture ?? ''; ?></small>
        <div class="text-center">
            <img id="image" class="w-25 rounded mt-3 rounded-circle " alt="">
        </div>
    </div>
    <div class="form-group mb-3 d-none" id="title_media_text">
        <input type="text" name="title_media" placeholder="Entrez le titre" id="title_media" value="">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
        <input type="hidden" name="id_media" value="<?= $page['id_media'] ?? ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>











<script>
    function toggleField() {
        const selectElement = document.getElementById("selection");
        const textField = document.getElementById("title_media_text");
        const field = document.getElementById("title_media_file");
        if (selectElement.options[selectElement.selectedIndex].text == "liens") {
            textField.classList.remove("d-none");
            // textField.style.display = "block";
            field.classList.add("d-none");
            // field.style.display = "none";

        } else {
            // textField.style.display = "none";
            // field.style.display = "block";
            field.classList.remove("d-none");
            textField.classList.add("d-none");
        }


    }



    let loadFile = function() {
        let image = document.getElementById('image');

        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>


<?php require_once '../inc/backfooter.inc.php';     ?>