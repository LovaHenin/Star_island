<?php require_once '../config/function.php';

// verifier si POST n'est pas vide
if(!empty($_POST)){

    if(empty($_POST['title_page']) && empty($_POST['url_page'])){

        $error=' Champs obligatoires';

    }

// on commence si error n'est pas définie pas de valeur
if(!isset($error)){//insert
// sinon c'est la modification
    if(empty($_POST['id_page'])){

        execute("INSERT INTO page (title_page,url) VALUES (:title_page,:url)", array(
            ':title_page' => $_POST['title_page'],
            ':url'=>$_POST['url_page']
        ));

        $_SESSION['messages']['success'][] = 'Média type ajouté';
        header('location:./page.php');
        exit();

    }
} else{ // modif

}




}























require_once '../inc/backheader.inc.php';
?>









<form  action="" method="post" class="w-50 mx-auto mt-5 mb-5"> 
    <div class="form-group">
        <label for="titre">Titre :</label>
        <input name="title_page" type="text" class="form-control" id="titre" placeholder="Entrez le titre">
    </div>
    <div class="form-group">
        <label for="url">URL :</label>
        <input name="url_page" type="text" class="form-control" id="url" placeholder="Entrez l'URL">
        <input type="hidden" name="id_page">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


<table class="table table-dark table-striped w-75 mx-auto">
        <thead>
        <tr>
            <th>Titre</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
            
    
            <tr>
                <td><?php  ?></td>
                <td><?php  ?></td>
                <td >
                    <a href="?id=<?php  ;?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?php  ;?>&a=del" onclick="return confirm('Etes-vous sûr?')"
                       class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>
       
        </tbody>
    </table>














<?php require_once '../inc/backfooter.inc.php';     ?>