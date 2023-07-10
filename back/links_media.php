<?php require_once '../config/function.php';








// contenues de la requete listes links de la table média dans le tableau
$links = "liens";
$medias_links = execute(
    "
SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
FROM media m
INNER JOIN media_type mt
ON m.id_media_type= mt.id_media_type
WHERE mt.title_media_type=:links",
    array(
        ':links' => $links
    )
)->fetchAll(PDO::FETCH_ASSOC);

// debug($medias_links);


//=> pour supprimer

if (!empty($_GET) && isset($_GET['id'])&& $_GET['a'] == 'del'){

    $supprfait = execute(
        "DELETE FROM media WHERE id_media=:id",
        array(
            ':id' => $_GET['id']

        )
    );

    if ($supprfait) {
        $_SESSION['messages']['success'][] = 'Page suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }
    header('location:./image_video_media.php');
    exit();
}


//=> pour modif
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {

    $id_media_modif = $_GET['id'];
    $title_media_modif=$links;
    $url = "./formulaire_media.php?id_media_modif=" . urlencode($id_media_modif) ."&title_media_modif=" .urlencode($title_media_modif);
    header("Location: " . $url);
    exit();




}

require_once '../inc/backheader.inc.php';
?>








<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Titre Media</th>
            <th>Nom Media</th>
            <th>Type de Media</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($medias_links as $media) : ?>
            <tr>
                <td><?= $media['title_media'] ?></td>
                <td><?= $media['name_media']   ?></td>
                <td><?= $media['title_media_type']   ?></td>
                <td>
                    <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                    <a href="?id=<?= $media['id_media']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $media['id_media']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


















<?php require_once '../inc/backfooter.inc.php';     ?>