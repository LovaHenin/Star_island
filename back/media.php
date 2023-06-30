<?php require_once '../config/function.php';








require_once '../inc/backheader.inc.php';
?>


<form action="" method="post" class="w-50 mx-auto mt-5 mb-5">

    <legend class="ml-3">MEDIA</legend>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="form-group w-50">
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

            </div>
            <div class="col-6">
                <div class="form-group w-50">
                    <small class="text-danger">*</small>
                    <label for="selection">Type de média</label>
                    <select id="selection" class="form-control" name="Select_id_page">
                        <?php foreach ($pages as $page) : ?>

                            <option value="<?= $page['id_page'] ?>" <?php if (isset($content['id_page']) && $page['id_page'] == $content['id_page']) {
                                                                        echo " selected";
                                                                    } ?>> <?= $page['title_page'] ?> </option>

                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
        </div>
    </div>





    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="titre">Titre Média(ALT)</label>
        <input name="title_content" type="text" class="form-control w-75" id="titre" placeholder="Entrez le titre" value="<?= $content['title_content'] ?? ''; ?>">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
    </div>
    <div class="form-group">
        <small class="text-danger">*</small>
        <label for="nom_media" class="form-label">Nom Média</label>
        <input onchange="loadFile()" name="nom_media" type="file" class="form-control" id="nom_media">
        <small class="text-danger"> <?= $error ?? ''; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>





<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Titre Media</th>
            <th>Nom Media</th>
            <th>Page du Media</th>
            <th>Type de Media</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>


            <tr>
                <td><?php ?></td>
                <td><?php   ?></td>
                <td><?php ?></td>
                <td>
                    <!--?id c'est dans $GET => s il y a plusieur variable en get on utilise &var=nom-->
                    <a href="?id=<?= $liste_content['id_content']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $liste_content['id_content']; ?>&a=del" onclick="return confirm('Etes-vous sûr?')" class="btn btn-outline-danger">Supprimer</a>

                </td>
            </tr>
       
    </tbody>
</table>

























<?php require_once '../inc/backfooter.inc.php';     ?>