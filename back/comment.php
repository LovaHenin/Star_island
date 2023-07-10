<?php require_once '../config/function.php';



$comments = execute(
    "
    SELECT m.title_media,m.name_media,c.rating_comment,c.comment_text,c.publish_date_comment,c.id_comment,c.nickname_comment
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
    }

    .star {
        color: gray;
        cursor: pointer;
    }

    .star.active {
        color: gold;
    }
</style>


<table class="table table-dark table-striped ">
    <thead>
        <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Commentaire</th>
            <th>Évaluation</th>
            <th>Photo</th>
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
                    <div class="star-rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                    </div>

                    <body onload="afficherAvis(<?= $comment['rating_comment'] ?? ''; ?>)">
                        <div id="star-rating"></div>
                </td>
                <td class="comment-photo"><img width="90" src="<?= '../assets/' . $comment['title_media']; ?>" alt="<?= $comment['name_media']  ?>"></td>
                <td> <a href="?id=<?= $liste_content['id_content']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>














<script>
    function afficherAvis(n) {
        var stars = document.getElementsByClassName('star');

        // Supprimer toutes les classes "active" des étoiles
        for (var i = 0; i < stars.length; i++) {
            stars[i].classList.remove('active');
        }

        // Ajouter la classe "active" aux premières n étoiles
        for (var j = 0; j < n; j++) {
            stars[j].classList.add('active');
        }
    }
</script>





<?php require_once '../inc/backfooter.inc.php';     ?>