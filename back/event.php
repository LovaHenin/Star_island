<?php require_once '../config/function.php';

// controle de formulaire si input est vide
if (!empty($_POST)) {


    $error = false;


    // input Dates et content pas vide

    if (empty($_POST['dateDebut'])) {

        $message_date_debut = 'ce champ est obligatoire';
        $error = true;
    }
    if (empty($_POST['dateFin'])) {

        $message_date_fin = 'ce champ est obligatoire';
        $error = true;
    }
    if (empty($_POST['description_content'])) {

        $message_decription = 'ce champ est obligatoire';
        $error = true;
    }
    if (empty($_POST['title_event'])) {

        $message_title = 'ce champ est obligatoire';
        $error = true;
    }

    // pour file
    if (empty($_FILES['title_media']['name'])) {
        if (empty($_POST['title_media'])) {
            $picture = 'Image événement obligatoire';
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

        if (empty($_GET['id_event'])) {

            // pour l'image type file
            $picture_bdd = '../assets/upload/' . uniqid() . date_format(new DateTime(), 'd_m_Y_H_i_s') . $_FILES['title_media']['name'];
            //debug($picture_bdd);
            // on la copie dans le dossier upload
            copy($_FILES['title_media']['tmp_name'], $picture_bdd);

            // ajout date debut et fin dans event
            $lastIdEvent = execute("INSERT INTO event (start_date_event,end_date_event) VALUES (:start_date_event,:end_date_event)", array(
                ':start_date_event' => $_POST['dateDebut'],
                ':end_date_event' => $_POST['dateFin']

            ), 'ggg');

            // recuperation de id_page_event
            $index_page_event =  execute("SELECT id_page FROM page WHERE title_page =:title_page", array(
                ':title_page' => 'event'
            ))->fetch(PDO::FETCH_ASSOC);


            // ajouter titre et description et id_page dans content
            $lastIdContent = execute("INSERT INTO content (title_content,description_content,id_page) VALUES (:title_content,:description_content,:id_page)", array(
                ':title_content' => $_POST['title_event'],
                ':description_content' => $_POST['description_content'],
                ':id_page' => $index_page_event['id_page']

            ), 'ggg');

            // recuperation de id_media_type
            $id_media_type =  execute("SELECT id_media_type FROM media_type WHERE title_media_type =:title_media_type", array(
                ':title_media_type' => 'event'
            ))->fetch(PDO::FETCH_ASSOC);


            //ajouter title_media, name_media, id_media_type dans la table media
            $lastIdMedia = execute("INSERT INTO media (title_media,name_media,id_media_type) VALUES (:title_media,:name_media,:id_media_type)", array(
                ':title_media' =>  !empty($_FILES['title_media']['name']) ? $picture_bdd : $_POST['title_media'],
                ':name_media' => $_POST['title_event'],
                ':id_media_type' => $id_media_type['id_media_type']

            ), 'ggg');



            // ajouter id_event et id_content dans event_content
            execute("INSERT INTO event_content (id_event,id_content) VALUES (:id_event,:id_content)", array(
                ':id_event' =>  $lastIdEvent,
                ':id_content' => $lastIdContent,

            ));

            // ajouter id_event et id_media dans event_media
            execute("INSERT INTO event_media (id_media,id_event) VALUES (:id_media,:id_event)", array(
                ':id_media' => $lastIdMedia,
                ':id_event' =>  $lastIdEvent


            ));


            $_SESSION['messages']['success'][] = 'Evénement ajouté';
            header('location:./event.php');
            exit();
        } else { //sinon=> id existe dans POST modification

        }
    }
}




$events = execute(
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
   "
)->fetchAll(PDO::FETCH_ASSOC);

// debug($events);
// die;

//=> pour supprimer





// suppression dans la table event_media et event_content si id_event

if (!empty($_GET) && isset($_GET['id'])) {

    // reccuperation des id_media dans event_media pour supprimer le media associé
    $event_medias = execute(
        "SELECT * FROM event_media WHERE id_event=:id",
        array(
            ':id' => $_GET['id']

        )
    )->fetchAll(PDO::FETCH_ASSOC);

    // reccuperation des id_content dans event_content pour supprimer le content associé
    $content_medias = execute(
        "SELECT * FROM event_content WHERE id_event=:id",
        array(
            ':id' => $_GET['id']

        )
    )->fetchAll(PDO::FETCH_ASSOC);

    $supprfait = execute(
        "DELETE FROM event_content WHERE id_event=:id",
        array(
            ':id' => $_GET['id']

        )
    );

    $supprfait1 = execute(
        "DELETE FROM event_media WHERE id_event=:id",
        array(
            ':id' => $_GET['id']

        )
    );


    // suppression dans la table media et content si id_event

    $supprfait2 = execute(
        "DELETE FROM media WHERE id_media=:id",
        array(
            ':id' => $event_medias['id_media']

        )
    );

    $supprfait3 = execute(
        "DELETE FROM content WHERE id_content=:id",
        array(
            ':id' => $content_medias['id_content']

        )
    );
    // suppression dans la table event

    $supprfait4 = execute(
        "DELETE FROM event WHERE id_event=:id",
        array(
            ':id' => $_GET['id']

        )
    );

    if ($supprfait) {
        $_SESSION['messages']['success'][] = 'Event_content suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }

    if ($supprfait1) {
        $_SESSION['messages']['success'][] = 'Event Media suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }
    if ($supprfait2) {
        $_SESSION['messages']['success'][] = 'Media suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }

    if ($supprfait3) {
        $_SESSION['messages']['success'][] = 'content suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }
    if ($supprfait4) {
        $_SESSION['messages']['success'][] = 'event suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }
    header('location:./event.php');
    exit();
}


require_once '../inc/backheader.inc.php';
?>
<style>
    .onoff {
        width: 32px;
        height: 32px;
        padding: 1px 2px 3px 3px;
        font-size: 12px;
        background: lightgray;
        text-align: center;
    }

    .onoff div {
        width: 18px;
        height: 18px;
        min-height: 18px;
        background: lightgray;
        overflow: hidden;
        border-top: 1px solid gray;
        border-right: 1px solid white;
        border-bottom: 1px solid white;
        border-left: 1px solid gray;
        margin: 0 auto;
        color: gray;
    }
</style>
<div class="container">
    <h1>Ajouter un événement</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <small class="text-danger">*</small>
            <label for="dateDebut">Sélectionnez une date de Debut:</label>
            <input type="date" class="form-control w-25" id="dateDebut" name="dateDebut">
            <small class="text-danger"> <?= $message_date_debut ?? ''; ?></small>
        </div>
        <div class="form-group mb-3">
            <small class="text-danger ">*</small>
            <label for="dateFin">Sélectionnez une date de Fin:</label>
            <input type="date" class="form-control w-25" id="dateFin" name="dateFin">
            <small class="text-danger"> <?= $message_date_fin ?? ''; ?></small>
        </div>
        <div class="form-group mb-3">
            <small class="text-danger">*</small>
            <label for="title_event" class="form-label">Title</label>
            <input type="text" name="title_event" class="form-control w-25" placeholder="Entrez le titre" id="title_event" value="">
            <small class="text-danger"> <?= $message_title ?? ''; ?></small>
        </div>
        <small class="text-danger">*</small>
        <label for="description_content"> Description</label>
        <textarea name="description_content" class="form-control" id="description_content" rows="3"><?= $content['description_content'] ?? ''; ?></textarea>
        <small class="text-danger"> <?= $message_decription ?? ''; ?></small>

        <div class="form-group mb-3">
            <small class="text-danger">*</small>
            <label for="title_media" class="form-label">Image associé à l'événement </label>
            <!-- avec loaadfile =>ajouter enctype dans form-->
            <input onchange="loadFile()" name="title_media" type="file" class="form-control w-50" id="title_media">
            <small class="text-danger"><?= $picture ?? ''; ?></small>
            <div class="text-center">
                <img id="image" class="w-25 rounded mt-3 rounded-circle " alt="">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>








<table class="table table-dark table-striped w-75 mx-auto mt-5">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Date de debut</th>
            <th>Date de fin</th>
            <th>Description</th>
            <th>Image</th>
            <th>Activation</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($events as $event) : ?>
            <tr>
                <td><?= $event['title_content']; ?></td>
                <td><?= $event['start_date_event']; ?></td>
                <td><?= $event['end_date_event']; ?></td>
                <td><?= $event['description_content']; ?></td>
                <td><img width="90" src="<?= '../assets/' . $event['title_media']; ?>" alt="<?= $event['title_content']; ?>"></td>
                <td><?= $event['activate']; ?>

                    <button class="onoff" onclick="onoff(this)">
                        <div>off</div>
                    </button>
                </td>
                <td>
                    <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                    <a href="?id=<?= $event['id_event']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    var buttonstate = 0;

    function onoff(element) {
        buttonstate = 1 - buttonstate;
        var blabel, bstyle, bcolor;
        if (buttonstate) {
            blabel = "on";
            bstyle = "green";
            bcolor = "lightgreen";
        } else {
            blabel = "off";
            bstyle = "lightgray";
            bcolor = "gray";
        }
        var child = element.firstChild;
        child.style.background = bstyle;
        child.style.color = bcolor;
        child.innerHTML = blabel;
    }
    let loadFile = function() {
        let image = document.getElementById('image');

        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<?php require_once '../inc/backfooter.inc.php';     ?>