<?php ob_start() ?>
<?php if ($pasDeLivre === false) : ?>

    <?php
    foreach ($livresAll as $livre) : ?>
        <div class="card my-3 mx-auto w-25" style="min-width: 350px;">
            <h3 class="card-header"><?= $livre->getTitre() ?></h3>
            <div class="card-body">
                <img class="mx-auto" style="height: auto; width: 200px;" src="public/images/<?= $livre->getImage() ?>">
            </div>
            <div class=" card-body">
                <div class="card-body">
                    <h5 class="card-title">Auteur : <?= $livre->getUploader() ?></h5>
                    <a href="#" class="card-link">En savoir plus...</a>
                </div>
                <div class="card-footer text-muted">
                Nombre de pages : <?= $livre->getNombrePages() ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php else : ?>
    <div class="d-flex flex-column">
        <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
            <div class="card-header">Votre espace</div>
            <div class="card-body">
                <h4 class="card-title">Désolé</h4>
                <p class="card-text">Il semble que vous n'ayez pas encore uploader de livre dans votre espace.</p>
                <p class="card-text">Pour y remédier, utilisez le bouton ci-dessous...</p>
            </div>
        </div>
        <a href="" class="btn btn-success">Ajouter</a>
    </div>
<?php endif; ?>

<?php
$titre = "Tous vos livres";
$content = ob_get_clean();
require "views/templates/template.view.php";
