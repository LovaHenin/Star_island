<?php require_once '../config/function.php';

// verifier si POST n'est pas vide
if (!empty($_POST)) {

    if (empty($_POST['title_page']) || empty($_POST['url_page'])) {

        $error = 'ce champ est obligatoire';
    }

    // on commence si error n'est pas définie pas de valeur




    if (!isset($error)) { //insert
        // si pas de retour id dans POST=> insert
        if (empty($_POST['id_page'])) {

            execute("INSERT INTO page (title_page,url) VALUES (:title_page,:url)", array(
                ':title_page' => $_POST['title_page'],
                ':url' => $_POST['url_page']
            ));

            $_SESSION['messages']['success'][] = 'Page ajouté';
            header('location:./page.php');
            exit();
        } else { //sinon=> id existe dans POST modification
            execute(
                "UPDATE page SET title_page=:title,url=:url WHERE id_page=:id",
                array(
                    // les POST venant du formulaire
                    ':id' => $_POST['id_page'],
                    ':title' => $_POST['title_page'],
                    ':url' => $_POST['url_page']
                )
            );
            $_SESSION['messages']['success'][] = 'Page modifiée';
            header('location:./page.php');
            exit();
        }
    
    }
} // fin insert & upadate

// contenues de la table page pour affichage dans le tableau
$pages = execute("SELECT*FROM page")->fetchAll(PDO::FETCH_ASSOC);
//debug($pages);

//=> pour modif
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    // les valeurs de $page à retourner au formulaire-> value
    $page = execute(
        "SELECT * FROM page WHERE id_page=:id",
        array(
            ':id' => $_GET['id']
        )
    )->fetch(PDO::FETCH_ASSOC);
}

//=> pour supprimer

if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {

    $supprfait= execute("DELETE FROM page WHERE id_page=:id",
    array(
        ':id'=>$_GET['id']

    ));

    if($supprfait){
        $_SESSION['messages']['success'][] = 'Page suprimée';
        header('location:./page.php');
        exit();
    }else{
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
        header('location:./page.php');
        exit();
    }
}
















require_once '../inc/backheader.inc.php';
?>









<form action="" method="post" class="w-50 mx-auto mt-5 mb-5">
    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="titre">Titre :</label>
        <input name="title_page" type="text" class="form-control" id="titre" placeholder="Entrez le titre" value="<?= $page['title_page'] ?? ''; ?>">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
    </div>
    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="url">URL :</label>
        <input name="url_page" type="text" class="form-control" id="url" placeholder="Entrez l'URL" value="<?= $page['url'] ?? ''; ?>">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
        <input type="hidden" name="id_page" value="<?=$page['id_page'] ?? '';?>">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Url</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $page) : ?>

            <tr>
                <td><?= $page['title_page'] ?></td>
                <td><?= $page['url']  ?></td>
                <td>
                    <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                    <a href="?id=<?= $page['id_page']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $page['id_page']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>














<?php require_once '../inc/backfooter.inc.php';     ?>