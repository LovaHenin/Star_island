<?php require_once '../config/function.php';







// contenues de la requete listes images et video de la table média dans le tableau
$links = "liens";
$medias_images_galerie = execute(
    "
SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
FROM media m
INNER JOIN media_type mt
ON m.id_media_type= mt.id_media_type
WHERE mt.title_media_type!=:links AND mt.title_media_type='galerie' ",
    array(
        ':links' => $links
    )
)->fetchAll(PDO::FETCH_ASSOC);

//debug($medias_images_videos);
$medias_images_avatar = execute(
    "
SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
FROM media m
INNER JOIN media_type mt
ON m.id_media_type= mt.id_media_type
WHERE mt.title_media_type!=:links AND mt.title_media_type='Avatars' ",
    array(
        ':links' => $links
    )
)->fetchAll(PDO::FETCH_ASSOC);

$medias_images_avatarTeams = execute(
    "
SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
FROM media m
INNER JOIN media_type mt
ON m.id_media_type= mt.id_media_type
WHERE mt.title_media_type!=:links AND mt.title_media_type='AvatarsTeams' ",
    array(
        ':links' => $links
    )
)->fetchAll(PDO::FETCH_ASSOC);


$medias_images_event = execute(
    "
SELECT m.title_media,m.name_media,mt.title_media_type,mt.id_media_type,m.id_media
FROM media m
INNER JOIN media_type mt
ON m.id_media_type= mt.id_media_type
WHERE mt.title_media_type!=:links AND mt.title_media_type='event' ",
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

<h2>Galerie</h2>
<div class=" d-flex ">
    
<?php foreach ($medias_images_galerie as $media_galerie) : ?>
 
    <div class="card mr-3" style="width: 10rem;">

        <img src="<?= '../assets/' . $media_galerie['title_media']; ?>" class="card-img-top" alt="<?= $media_galerie['name_media']   ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $media_galerie['name_media']   ?></h5>
            <a href="?id=<?= $media_galerie['id_media']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-primary"> Supprimer</a>
        </div>

    </div>
<?php endforeach; ?>
</div>

<h2>Avatars</h2>
<div class=" d-flex ">
    
<?php foreach ($medias_images_avatarTeams as $media_avatarTeam) : ?>
 
    <div class="card mr-3" style="width: 10rem;">

        <img src="<?= '../assets/' . $media_avatarTeam['title_media']; ?>" class="card-img-top" alt="<?= $media_avatarTeam['name_media']   ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $media_avatarTeam['name_media']   ?></h5>
            <a href="?id=<?= $media_avatarTeam['id_media']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-primary"> Supprimer</a>
        </div>

    </div>
<?php endforeach; ?>
</div>


<h2>Avatars Teams</h2>
<div class=" d-flex ">
    
<?php foreach ($medias_images_avatar as $media_avatar) : ?>
 
    <div class="card mr-3" style="width: 10rem;">

        <img src="<?= '../assets/' . $media_avatar['title_media']; ?>" class="card-img-top" alt="<?= $media_avatar['name_media']   ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $media_avatar['name_media']   ?></h5>
            <a href="?id=<?= $media_avatar['id_media']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-primary"> Supprimer</a>
        </div>

    </div>
<?php endforeach; ?>
</div>


<h2>Evenement</h2>
<div class=" d-flex ">
    
<?php foreach ($medias_images_event as $media_event) : ?>
 
    <div class="card mr-3" style="width: 10rem;">

        <img src="<?= '../assets/' . $media_event['title_media']; ?>" class="card-img-top" alt="<?= $media_event['name_media']   ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $media_event['name_media']   ?></h5>
            <a href="?id=<?= $media_event['id_media']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-primary"> Supprimer</a>
        </div>

    </div>
<?php endforeach; ?>
</div>

















<?php require_once '../inc/backfooter.inc.php';     ?>