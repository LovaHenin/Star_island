<?php require_once '../config/function.php';

//redirection

if (!empty($_POST) && empty($_POST['id_media_type'])) {

    if (empty($_POST['title_media_type'])) {
        $error = 'ce champs est obligatoire';
    }

    if (!isset($error)) {
        execute("INSERT INTO media_type (title_media_type) VALUES (:title_media_type)", array(
            ':title_media_type' => $_POST['title_media_type']
        ));

        $_SESSION['messages']['success'][] = 'Média type ajouté';
        header('location:./media_type.php');
        exit;
    }
} // fin de post
// debut modification

$medias_type = execute("SELECT*FROM media_type")->fetchAll(PDO::FETCH_ASSOC);
//debug($medias_type);

if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    // id => venant de click du formulaire => =:id
    $media_type = execute(
        "SELECT * FROM media_type WHERE id_media_type=:id",
        array(
            ':id' => $_GET['id']
        )
    )->fetch(PDO::FETCH_ASSOC);
    // debug($media_type);


}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {

    //$result false suppression pas effectué
    $success = execute("DELETE FROM media_type WHERE id_media_type=:id", array(
        ':id' => $_GET['id']
    ));
    if ($success) {
        $_SESSION['messages']['success'][] = 'Média type supprimé';
        // header('location:./media_type.php');
        // exit;
    } else {
        $_SESSION['messages']['success'][] = 'Probleme de traitement veuillez réitérer';
        
    }
    header('location:./media_type.php');
    exit;
}
if (!empty($_POST) && !empty($_POST['id_media_type'])) {
    //debug($_POST);
    //die;
    execute(
        "UPDATE media_type SET title_media_type=:title WHERE id_media_type=:id",
        array(
            ':id' => $_POST['id_media_type'],
            ':title' => $_POST['title_media_type']

        )
    );
    $_SESSION['messages']['success'][] = 'Média type modifié';
    header('location:./media_type.php');
    exit;
} // fin soummission modification




require_once '../inc/backheader.inc.php';
?>

<form action="" method="post" class="w-75 mx-auto mt-5 mb-5">
    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="media_type" class="form-label">Nom du type de media</label>
        <!-- $error?? par défaut-->
        <small class="text-danger"><?= $error ?? ''; ?></small>
        <input name="title_media_type" id="media_type" placeholder="Nom du type de media" value="<?= $media_type['title_media_type'] ?? ''; ?>" type="text" class="form-control">
    </div>
    <!-- php7 ?? '' nul coalescent pour le vider on met hidden car après une action on perd $_GET-->
    <input type="hidden" name="id_media_type" value="<?= $media_type['id_media_type'] ?? ''; ?>">
    <button type="submit" class="btn btn-primary mt-2">Valider</button>


</form>



<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Titre</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medias_type as $media_type) : ?>
            <tr>
                <!--title_media_type le champ de la table =? => echo-->
                <td> <?= $media_type['title_media_type']; ?></td>
                <td>
                    <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                    <a href="?id=<?= $media_type['id_media_type']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $media_type['id_media_type']; ?>&a=del" onclick="return confirm('Etes vous-sur ?') " class="btn btn-outline-danger">Supprimer</a>
                    <!-- on peut tester on sruvolant le bouton en bas l'url-->
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>






<?php require_once '../inc/backfooter.inc.php';     ?>