<?php require_once '../config/function.php';

// controle de formulaire si input name vide
if (!empty($_POST)) {

    if (empty($_POST['title_content']) || empty($_POST['description'])) {

        $error = 'ce champ est obligatoire';
    }

    // on commence si error n'est pas définie pas de valeur




    if (!isset($error)) { //insert
        // si pas de retour id dans POST=> insert

        if (empty($_POST['id_content'])) {

            execute("INSERT INTO content (title_content,description_content,id_page) VALUES (:title_content,:description_content,:id_page)", array(
                ':title_content' => $_POST['title_content'],
                ':description_content' => $_POST['description'],
                ':id_page' => $_POST['Select_id_page']
            ));

            $_SESSION['messages']['success'][] = 'Page ajouté';
            header('location:./content.php');
            exit();
        } else { //sinon=> id existe dans POST modification
            execute(
                "UPDATE content SET title_content=:title_content,description_content=:description_content,id_page=:id_page WHERE id_content=:id_content",
                array(
                    // les POST venant du formulaire
                    ':title_content' => $_POST['title_content'],
                    ':description_content' => $_POST['description'],
                    ':id_page' => $_POST['Select_id_page'],
                    ':id_content' => $_POST['id_content']
                )
            );
            $_SESSION['messages']['success'][] = 'content modifiée';
            header('location:./content.php');
            exit();
        }
    }
} // fin insert & upadate






// contenues de la table page pour affichage dans le select
$pages = execute("SELECT*FROM page")->fetchAll(PDO::FETCH_ASSOC);
//debug($pages);


// contenues de la table content juste pour id_content=>hidden
$contents = execute("SELECT*FROM content")->fetchAll(PDO::FETCH_ASSOC);
//debug($contents);

//remplir le tableau avec title_content et description_content => content et title_page=>page

$listes_content = execute("
SELECT c.title_content, p.title_page,c.description_content,c.id_content
FROM content c
INNER JOIN page p
ON c.id_page= p.id_page
")->fetchAll(PDO::FETCH_ASSOC);

//debug($listes_content);

//=> pour modif
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    // les valeurs de $page à retourner au formulaire-> value
    $content = execute(

        "SELECT c.title_content, p.title_page,c.description_content,c.id_content,p.id_page
        FROM content c
        INNER JOIN page p
        ON c.id_page= p.id_page
        WHERE id_content=:id",
        array(
            ':id' => $_GET['id']
        )
    )->fetch(PDO::FETCH_ASSOC);

    // debug($content);


}

//=> pour supprimer

if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {

    $supprfait = execute(
        "DELETE FROM content WHERE id_content=:id",
        array(
            ':id' => $_GET['id']

        )
    );

    if ($supprfait) {
        $_SESSION['messages']['success'][] = 'Page suprimée';
    } else {
        $_SESSION['messages']['success'][] = 'Il y a un problème, veuillez réitérer';
    }
    header('location:./content.php');
    exit();
}





require_once '../inc/backheader.inc.php';
?>
 <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        table td, table th {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
<form action="" method="post" class="w-50 mx-auto mt-5 mb-5">

    <legend>Gestion Content</legend>

    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="titre">Titre</label>
        <input name="title_content" type="text" class="form-control" id="titre" placeholder="Entrez le titre" value="<?= $content['title_content'] ?? ''; ?>">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
    </div>

    <div class="form-group w-25">
        <small class="text-danger">*</small>
        <label for="selection">Choisir la page</label>
        <select id="selection" class="form-control" name="Select_id_page">
            <?php foreach ($pages as $page) : ?>

                <option value="<?= $page['id_page'] ?>" <?php if (isset($content['id_page']) && $page['id_page'] == $content['id_page']) {
                                                            echo " selected";
                                                        } ?>> <?= $page['title_page'] ?> </option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3"><?= $content['description_content'] ?? ''; ?></textarea>
        <small class="text-danger"> <?= $error ?? ''; ?></small>
        <input type="hidden" name="id_content" value="<?= $content['id_content'] ?? ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Page</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listes_content as $liste_content) : ?>

            <tr>
                <td><?= $liste_content['title_content'] ?></td>
                <td><?= $liste_content['title_page']  ?></td>
                <td><?= $liste_content['description_content']  ?></td>
                <td>
                    <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                    <a href="?id=<?= $liste_content['id_content']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $liste_content['id_content']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>











<?php require_once '../inc/backfooter.inc.php';     ?>