<?php require_once '../config/function.php';

$roles = array(
    "Admins" => "Admins",
    "Staff/Modos" => "Staff/Modos",
    "Développeurs" => "Développeurs",
    "Mappers" => "Mappers",
    "Helpers" => "Helpers"

);
$inputNames = array(
    'Discord' => 'discord',
    'Facebook' => 'Facebook',
    'Twitter' => 'Twitter',
    'Tiktok' => 'Tiktok',
    'Youtube' => 'Youtube',
    'Instagram' => 'Instagram'
);

// controle de formulaire si input est vide
if (!empty($_POST)) {

    $noms = $_POST["nom"];
    $liens = $_POST["lien"];
    $error = false;
    $nombreLiens = count($noms);

    for ($i = 0; $i < $nombreLiens; $i++) {
        $nom = $noms[$i];
        $lien = $liens[$i];

        if (empty($nom) || empty($lien)) {
            // Au moins un champ est vide, afficher un message d'erreur
            $error_input = "Veuillez remplir tous les champs !";
            $error = true;
        }
    }

    if (empty($_POST['nickname_team'])) {

        $message_nickname = 'ce champ est obligatoire';
        $error = true;
    }
    if ($_POST['Select_id_media_type'] == 'Choisir un role') {

        $message_role = 'il faut choisir un role';
        $error = true;
    }










    // pour file
    if (empty($_FILES['title_media']['name'])) {
        if (empty($_POST['title_media'])) {
            $picture = 'Avatar obligatoire';
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


    //A revoir lien , role
    //debug();
    //die;
    if (!$error) { //insert

        if (empty($_GET['id_teams'])) { // si modif 

            // pour l'image type file
            $picture_bdd = '../assets/upload/' . uniqid() . date_format(new DateTime(), 'd_m_Y_H_i_s') . $_FILES['title_media']['name'];
            //debug($picture_bdd);
            // on la copie dans le dossier upload
            copy($_FILES['title_media']['tmp_name'], $picture_bdd);

            // ajout dans Team
            $lastIdTeam = execute("INSERT INTO team (role_team,nickname_team) VALUES (:role_team,:nickname_team)", array(
                ':role_team' => $_POST['Select_id_media_type'],
                ':nickname_team' => $_POST['nickname_team']

            ), 'ggg');

            // recuperation de id_media_type AvatarTeams
            $id_media_type_avatar =  execute("SELECT id_media_type FROM media_type WHERE title_media_type =:title_media_type", array(
                ':title_media_type' => 'AvatarsTeams'
            ))->fetch(PDO::FETCH_ASSOC);

            // recuperation de id_media_type Avatar
            $id_media_type_liens =  execute("SELECT id_media_type FROM media_type WHERE title_media_type =:title_media_type", array(
                ':title_media_type' => 'liens'
            ))->fetch(PDO::FETCH_ASSOC);
            //debug($id_media_type_liens);
            //die;

            //ajouter title_media, name_media, id_media_type dans la table media
            $lastIdMediaAvatar = execute("INSERT INTO media (title_media,name_media,id_media_type) VALUES (:title_media,:name_media,:id_media_type)", array(
                ':title_media' =>  !empty($_FILES['title_media']['name']) ? $picture_bdd : $_POST['title_media'],
                ':name_media' => 'avatar',
                ':id_media_type' => $id_media_type_avatar['id_media_type']

            ), 'ggg');

            for ($i = 0; $i < $nombreLiens; $i++) {
                // $nom = $noms[$i];
                // $lien = $liens[$i];
                $lastIdMediaLink = execute("INSERT INTO media (title_media,name_media,id_media_type) VALUES (:title_media,:name_media,:id_media_type)", array(
                    ':title_media' =>$liens[$i],
                    ':name_media' => $noms[$i],
                    ':id_media_type' => $id_media_type_liens['id_media_type']

                ), 'ggg');

                 // ajouter id_media et id_team dans team_media
            execute("INSERT INTO team_media (id_media,id_team) VALUES (:id_media,:id_team)", array(
                ':id_media' =>  $lastIdMediaLink,
                ':id_team' => $lastIdTeam,

            ));
            }
            // ajouter id_media et id_team dans team_media
            execute("INSERT INTO team_media (id_media,id_team) VALUES (:id_media,:id_team)", array(
                ':id_media' =>  $lastIdMediaAvatar,
                ':id_team' => $lastIdTeam,

            ));

           

            $_SESSION['messages']['success'][] = 'Equipe ajouté';
            header('location:./teams.php');
            exit();
        } else { //sinon=> id existe dans POST modification

        }
    }
}









// pour afficher le tableau en dessous
$galeries = execute(
    "
    SELECT m.title_media
    FROM media m
    INNER JOIN media_type mt
    ON m.id_media_type=mt.id_media_type
    WHERE (mt.title_media_type='galerie')"

)->fetchAll(PDO::FETCH_ASSOC);

//debug($galeries);



// contenues de la table media_type pour affichage dans le select
$medias_type = execute("SELECT*FROM media_type ")->fetchAll(PDO::FETCH_ASSOC);
//debug($medias_type);


$teams = execute("SELECT * FROM team")->fetchAll(PDO::FETCH_ASSOC);
//debug($teams);


//=> pour supprimer




// suppression dans la table team_media si id_team
if (!empty($_GET) && isset($_GET['id'])) {

    // reccuperation des id_meida dans team_media pour supprimer les medias associé
$team_medias = execute("SELECT * FROM team_media WHERE id_team=:id",
array(
   ':id' => $_GET['id']

))->fetchAll(PDO::FETCH_ASSOC);

     foreach ($teams as $cle => $team) : 

    $supprfait = execute(
        "DELETE FROM team_media WHERE id_team=:id",
        array(
            ':id' => $_GET['id']

        ));
     endforeach;

   

     foreach ($team_medias as $cle => $team_media) : 

        $supprfait1 = execute(
            "DELETE FROM media WHERE id_media=:id",
            array(
                ':id' => $team_media['id_media']
    
            )
        );
         endforeach;

         $supprfait2 = execute(
            "DELETE FROM team WHERE id_team=:id",
            array(
                ':id' => $_GET['id']
    
            ));

    if ($supprfait) {
        $_SESSION['messages']['success'][] = 'Team Media suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }

    if ($supprfait1) {
        $_SESSION['messages']['success'][] = 'Media suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }

    if ($supprfait2) {
        $_SESSION['messages']['success'][] = 'Team suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }
    header('location:./teams.php');
    exit();
}




require_once '../inc/backheader.inc.php';
?>

<h1 class="d-flex justify-content-center">Teams</h1>
<form action="" method="post" class="w-50 mx-auto mt-5 mb-5" enctype="multipart/form-data">

    <div class="mb-3">
        <small class="text-danger">*</small>
        <label for="nickname_team" class="form-label">Nom</label>
        <input name="nickname_team" type="text" class="form-control w-50" id="nickname_team" placeholder="Votre nom">
        <small class="text-danger"> <?= $message_nickname ?? ''; ?></small>
    </div>

    <div class="mb-3">
        <small class="text-danger">*</small>
        <label for="selection" class="form-label">Role :</label>
        <small class="text-danger"><?= $message_role ?? ''; ?></small>
        <select id="selection" class="form-control w-25" name="Select_id_media_type" onchange="toggleField()">
            <option selected disabled>Choisir un role</option>
            <small class="text-danger"><?= $message_role ?? ''; ?></small>
            <?php foreach ($roles as $cle => $role) : ?>

                <option value="<?= $cle ?>"><?= $role ?> </option>

            <?php endforeach; ?>
        </select>


    </div>



    <div class="form-group mb-3" id="title_media_file">
        <small class="text-danger">*</small>
        <label for="title_media" class="form-label">Choisir un avatar</label>
        <!-- avec loaadfile =>ajouter enctype dans form-->
        <input onchange="loadFile()" name="title_media" type="file" class="form-control w-50" id="title_media">
        <small class="text-danger"><?= $picture ?? ''; ?></small>
        <div class="text-center">
            <img id="image" class="w-25 rounded mt-3 rounded-circle " alt="">
        </div>
    </div>


    <small class="text-danger"><?= $error_input  ?? ''; ?></small>

    <div id="linksContainer" class="mb-5">
        <small class="text-danger"><?= $error_input ?? ''; ?></small>
        <!-- Conteneur pour les liens ajoutés -->
    </div>


    <button type="submit" class="btn btn-primary">Valider</button>

</form>


<div class="d-flex justify-content-center"">


<button id=" addLinkButton" class="form-group btn btn-primary" onclick="ajouterLien()">Ajouter des lien(s)</button>
</div>


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
        <?php foreach ($teams as $team) :

            $medias_links = execute(
                "
                SELECT m.name_media,m.title_media,m.id_media_type
                FROM media m
                INNER JOIN team_media tm
                ON m.id_media=tm.id_media
                INNER JOIN media_type mt
                ON m.id_media_type=mt.id_media_type
                WHERE (tm.id_team=:id_team AND mt.title_media_type='liens')",
                array(
                    ':id_team' => $team['id_team']
                )
            )->fetchAll(PDO::FETCH_ASSOC);


            $medias_avatar = execute(
                "
                SELECT m.name_media,m.title_media,m.id_media_type,mt.title_media_type
                FROM media m
                INNER JOIN team_media tm
                ON m.id_media=tm.id_media
                INNER JOIN media_type mt
                ON m.id_media_type=mt.id_media_type
                WHERE (tm.id_team=:id_team AND mt.title_media_type='AvatarsTeams')",
                array(
                    ':id_team' => $team['id_team']
                )
            )->fetchAll(PDO::FETCH_ASSOC);

        ?>

            <tr>
                <td><?= $team['nickname_team'] ?></td>
                <td><?= $team['role_team'] ?></td>
                <td>

                    <table class="table table-dark table-striped  mx-auto">
                        <thead>
                            <tr>
                                <th>Liens</th>
                                <th>Avatar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <table class="table table-dark table-striped  mx-auto">
                                        <thead>
                                            <tr>

                                                <th>Nom</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($medias_links as $media_link) : ?>

                                                <tr>
                                                    <td><?= $media_link['title_media'] ?></td>

                                                    <td>

                                                        <a href="?id=<?php ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>


                                </td>
                                <td>

                                    <table class="table table-dark table-striped  mx-auto">
                                        <thead>
                                            <tr>

                                                <th>Nom</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($medias_avatar as $media_avatar) : ?>

                                                <tr>
                                                    <td><img width="90" src="<?= '../assets/' . $media_avatar['title_media']; ?>" alt="<?php  ?>"></td>

                                                    <td>

                                                        <a href="?id=<?php ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </td>


                            </tr>

                        </tbody>
                    </table>






                </td>
                <td>

                    <a href="?id=<?= $team['id_team']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>






<script>
    let loadFile = function() {
        let image = document.getElementById('image');

        image.src = URL.createObjectURL(event.target.files[0]);
    }

    window.onload = function() {
        var myElement = document.getElementById('myElement');
        myElement.onload = loadFile;
    };


    function ajouterLien() {
        var linksContainer = document.getElementById("linksContainer");

        // Créer un nouveau div pour le lien
        var div = document.createElement("div");
        div.className = "link-input";

        // Créer l'input pour le nom
        var nameInput = document.createElement("input");
        nameInput.type = "text";
        nameInput.name = "nom[]";
        nameInput.className = "w-25"
        nameInput.placeholder = "Entrez le nom du lien";
        div.appendChild(nameInput);

        // Créer l'input pour le lien
        var lienInput = document.createElement("input");
        lienInput.type = "text";
        lienInput.name = "lien[]";
        lienInput.className = "w-50 ml-2"
        lienInput.placeholder = "Entrez le lien";
        div.appendChild(lienInput);

        // Créer le bouton pour supprimer le div
        var deleteButton = document.createElement("button");
        deleteButton.innerHTML = "Supprimer";
        deleteButton.className = "btn btn-danger  ml-5";
        deleteButton.onclick = function() {
            div.remove();
        };
        div.appendChild(deleteButton);

        // Ajouter le div au conteneur des liens
        linksContainer.appendChild(div);
    }
</script>
<?php require_once '../inc/backfooter.inc.php';     ?>