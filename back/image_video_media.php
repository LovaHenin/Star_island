<?php require_once '../config/function.php';







// contenues de la requete listes images et video de la table média dans le tableau
$links = "liens";
$medias_images_videos = execute(
    "
SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
FROM media m
INNER JOIN media_type mt
ON m.id_media_type= mt.id_media_type
WHERE mt.title_media_type!=:links",
    array(
        ':links' => $links
    )
)->fetchAll(PDO::FETCH_ASSOC);







//=> pour supprimer

if (!empty($_GET) && isset($_GET['id'])) {

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



require_once '../inc/backheader.inc.php';
?>
<style>
    .card {
        margin-bottom: 3rem;
    }
</style>


<div class="d-flex ">
<?php foreach ($medias_images_videos as $media) : ?>
 
    <div class="card mr-3" style="width: 10rem;">

        <img src="<?= '../assets/' . $media['title_media']; ?>" class="card-img-top" alt="<?= $media['name_media']   ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $media['name_media']   ?></h5>
            <a href="?id=<?= $media['id_media']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-primary"> Supprimer</a>
        </div>

    </div>
<?php endforeach; ?>
</div>























<?php require_once '../inc/backfooter.inc.php';     ?>