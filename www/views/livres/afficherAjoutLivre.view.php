<?php ob_start() ?>

<form class="m-auto w-50" method="POST" action="<?= SITE_URL ?>/livres/av" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <label for="identifiant" class="form-label mt-4">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" aria-describedby="titreHelp" placeholder="Entrez votre titre">
        </div>
        <div class="form-group">
            <label for="nbePages" class="form-label mt-4">Nombre de pages</label>
            <input type="number" class="form-control" name="nbPages" id="nbPages" placeholder="Nombre de pages">
        </div>
        <div class="form-group">
            <label for="image" class="form-label mt-4">Votre image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="resume" class="form-label mt-4">Résumé</label>
            <textarea style="resize: none;" class="form-control" name="resume" id="resume" placeholder="Entrez votre résumé"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Ajouter</button>
</form>

<?php
$titre = "Ajout livre";
$content = ob_get_clean();
require_once "views/templates/template.view.php";
