<?php ob_start() ?>

<form class="m-auto w-50" method="POST"  onsubmit="return confirm('Voulez-vous vraiment modifier le livre <?= $livre->getTitre(); ?>')" action="<?= SITE_URL ?>/livres" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <label for="identifiant" class="form-label mt-4">Titre</label>
            <input type="text" value="<?= $livre->getTitre() ?>" class="form-control" name="titre" id="titre" aria-describedby="titreHelp" placeholder="Entrez votre titre">
        </div>
        <div class="form-group">
            <label for="nbePages" class="form-label mt-4">Nombre de pages</label>
            <input type="number" value="<?= $livre->getNbPages() ?>" class="form-control" name="nbPages" id="nbPages" placeholder="Nombre de pages">
        </div>
        <img src="<?= SITE_URL ?>public/images/<?= $livre->getImage(); ?>" style="max-height:250px; margin-top:16px;" alt="<?= $livre->getTitre(); ?>">
        <div class="form-group">
            <label for="image" class="form-label mt-4">Votre image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="resume" class="form-label mt-4">Résumé</label>
            <textarea class="form-control" name="resume" id="resume" placeholder="Entrez votre résumé"><?= $livre->getResume() ?></textarea>
        </div>

        <input type="hidden" value="<?= $livre->getId() ?>" name="id_livre">

        <button type="submit" class="btn btn-primary mt-4">Modifier</button>

</form>

<?php
$titre = "Modification livre";
$content = ob_get_clean();
require_once "views/templates/template.view.php";
