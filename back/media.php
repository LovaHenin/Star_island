<?php require_once '../config/function.php';



// controle de formulaire si input est vide
if (!empty($_POST)) {

    $error = false;

    // input name
    if (empty($_POST['name_media'])) {

        $message = 'ce champ est obligatoire';
        $error = true;
    }
debug($_FILES);
die;
    // pour file
    if (empty($_FILES['title_media']['name'])) {
        $picture = 'title media obligatoire';
        $error = true;
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

   
    if ($error) { //insert
        // si pas de retour id dans POST=> insert
        
        $picture_bdd = 'upload/' . uniqid() . date_format(new DateTime(), 'd_m_Y_H_i_s') . $_FILES['title_media']['name'];

        // on la copie dans le dossier upload
        copy($_FILES['title_media']['tmp_name'], '../assets/' . $picture_bdd);

        execute("INSERT INTO media (title_media,name_media,id_media_type) VALUES (:title_media,:name_media,:id_media_type)", array(
            ':title_media' => $picture_bdd,
            ':name_media' => $_POST['name_media'],
            ':id_media_type' => $_POST['Select_id_media_type']
    
        ));}
} // fin insert & upadate











// contenues de la table media_type pour affichage dans le select
$medias_type = execute("SELECT*FROM media_type ")->fetchAll(PDO::FETCH_ASSOC);
//debug($medias);


// contenues de la requete listes dans le tableau
$medias = execute("
SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
FROM media m
INNER JOIN media_type mt
ON m.id_media_type= mt.id_media_type
")->fetchAll(PDO::FETCH_ASSOC);

//debug($listes_medias);


require_once '../inc/backheader.inc.php';
?>
<style>
    .titre_texte {
        display: none;
    }
</style>

<form action="" method="post" class="w-50 mx-auto mt-5 mb-5">

    <legend class="ml-3">MEDIA</legend>


    <div class="form-group w-25">
        <small class="text-danger">*</small>
        <label for="selection">Type de média</label>
        <select id="selection" class="form-control" name="Select_id_media_type" onchange="toggleField()">
            <?php foreach ($medias_type as $media_type) : ?>

                <option value="<?= $media_type['id_media_type'] ?>"> <?= $media_type['title_media_type'] ?></option>

            <?php endforeach; ?>
        </select>
    </div>





    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="titre">Name(ALT)</label>
        <input name="name_media" type="text" class="form-control w-75" id="name_media" placeholder="Entrez le nom" value="">
        <small class="text-danger"> <?= $message ?? ''; ?></small>
    </div>
    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="title_media" class="form-label">Title</label>
        <input onchange="loadFile()" name="title_media" type="file" class="form-control" id="title_media_file">
        <small class="text-danger"><?= $picture ?? ''; ?></small>

        <input type="text" name="title_media" placeholder="Entrez le titre" class="titre_texte" id="title_media_text" value="">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
        <input type="hidden" name="id_media" value="<?= $page['id_media'] ?? ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>





<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Titre Media</th>
            <th>Nom Media (ALT)</th>
            <th>Type de Media</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($medias as $media) : ?>
            <tr>
                <td><?= $media['title_media'] ?></td>
                <td><?= $media['name_media']   ?></td>
                <td><?= $media['title_media_type']   ?></td>
                <td>
                    <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                    <a href="?id=<?= $liste_content['id_content']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $liste_content['id_content']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>






















<script>
    function toggleField() {
        const selectElement = document.getElementById("selection");
        const textField = document.getElementById("title_media_text");
        const field = document.getElementById("title_media_file");
        if (selectElement.options[selectElement.selectedIndex].text == "liens") {
            textField.style.display = "block";
            field.style.display = "none";

        } else {
            textField.style.display = "none";
            field.style.display = "block";
        }


    }
</script>


<?php require_once '../inc/backfooter.inc.php';     ?>