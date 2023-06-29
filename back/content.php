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
            ':id_page'=>$_POST['Select_id_page']
        ));

        $_SESSION['messages']['success'][] = 'Page ajouté';
        header('location:./page.php');
        exit();
    } else { //sinon=> id existe dans POST modification
        
    }

}
} // fin insert & upadate






// contenues de la table page pour affichage dans le tableau
$pages = execute("SELECT*FROM page")->fetchAll(PDO::FETCH_ASSOC);
//debug($pages);


// contenues de la table page pour affichage dans le tableau
$contents = execute("SELECT*FROM content")->fetchAll(PDO::FETCH_ASSOC);
//debug($contents);











require_once '../inc/backheader.inc.php';
?>

<form action="" method="post" class="w-50 mx-auto mt-5 mb-5">

    <legend>Gestion Content</legend>

    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="titre">Titre</label>
        <input name="title_content" type="text" class="form-control" id="titre" placeholder="Entrez le titre">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
    </div>

    <div class="form-group w-25">
        <small class="text-danger">*</small>
        <label for="selection">Page</label>
        <select id="selection" class="form-control" name="Select_id_page">
            <?php foreach ($pages as $page) : ?>
                <option value="<?=$page['id_page']?>"><?=$page['title_page']?></option>
               
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
        <small class="text-danger"> <?= $error ?? ''; ?></small>
        <input type="hidden" name="id_content" value="<?=$content['id_content'] ?? '';?>">
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


        <tr>
            <td><?php ?></td>
            <td><?php  ?></td>
            <td><?php  ?></td>
            <td>
                <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                <a href="" class="btn btn-outline-info">Modifier</a>
                <a href="" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>
            </td>
        </tr>

    </tbody>
</table>











<?php require_once '../inc/backfooter.inc.php';     ?>