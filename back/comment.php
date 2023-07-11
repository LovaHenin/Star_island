<?php require_once '../config/function.php';


// recuperer toutes les comment et id_media et title media
$comments = execute(
    "
    SELECT m.title_media,m.name_media,c.rating_comment,c.comment_text,c.publish_date_comment,c.id_comment,c.nickname_comment,c.activate
    FROM media m
    INNER JOIN comment c
    ON m.id_media=c.id_media
   "

)->fetchAll(PDO::FETCH_ASSOC);

//debug($comments);


require_once '../inc/backheader.inc.php';
?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    .star-rating {
        font-size: 15px;
        width: 150px;
    }

    .star {
        color: gray;
        cursor: pointer;
    }

    .star.active {
        color: gold;
    }
</style>
<h1 class="d-flex justify-content-center mb-5"> Commentaires</h1>

<table class="table table-dark table-striped ">
    <thead>
        <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Commentaire</th>
            <th>Évaluation</th>
            <th>Photo</th>
            <th>Activation</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) : ?>

            <tr>
                <td><?= $comment['publish_date_comment']; ?></td>
                <td><?= $comment['nickname_comment']; ?></td>
                <td><?= $comment['comment_text']; ?></td>
                <td class="rating-stars">
                    <div class="star-rating " colspan="2">
                            <?php 
                            for ($i=0; $i < 5 ; $i++) { 
                               if($i<$comment['rating_comment']){
                               echo "<i class='fas fa-star  text-warning'></i>";
                               } else {
                                echo "<i class='fas fa-star text-secondary'></i>";
                               }
                            } 
                            
                            ?>
                       
                    </div>

                 
                </td>
                <td class="comment-photo"><img width="90" src="<?= '../assets/' . $comment['title_media']; ?>" alt="<?= $comment['name_media']  ?>"></td>
                <td><?= $comment['activate']; ?></td>
                <td> <a href="?id=<?= $liste_content['id_content']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



















<?php require_once '../inc/backfooter.inc.php';     ?>