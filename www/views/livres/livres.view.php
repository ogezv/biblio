<?php

if (!isset($_SESSION['user'])) header("location: connexion");
?>

<?php ob_start() //buffer démarré 
?>
<div class="d-flex justify-content-evenly flex-wrap">
    <?php foreach ($livresEnCours as $livre) : ?>
        <div class="card my-3 mx-auto w-25" style="min-width: 400px;">
            <h3 class="card mb-3 align-items-center"><a class="text-white card-header" href="<?= SITE_URL ?>livres/l/<?php echo $livre->getId(); ?>"><?php echo $livre->getTitre(); ?></a></h3>
            <img src="public/images/<?= $livre->getImage() ?>" height="100px" alt="Livre pour <?php echo $livre->getTitre(); ?>">
            <div class=" card-body">
                <div class="card-body">
                    <p class="card-text"><?= $livre->getResume() ?></p>
                </div>
                <div class="card-footer text-muted">
                    Nombre de pages : <?= $livre->getNbPages(); ?>
                    <div class="card-text d-flex justify-content-evenly pt-3">
                        <form action="<?= SITE_URL ?>livres/m/<?= $livre->getId(); ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment modifier le livre <?= $livre->getTitre(); ?>')">
                            <button type="submit" class="btn btn-warning">Modifier</button>
                        </form>
                        <form action="<?= SITE_URL ?>livres/s/<?= $livre->getId(); ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer le livre <?= $livre->getTitre(); ?>')">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<a href="<?= SITE_URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>

<?php
// buffer restitué
$content = ob_get_clean();
$titre = 'Livres de ' . $_SESSION['user']['identifiant'];

require_once "views/templates/template.view.php";
// echo $_SESSION['user']['id'];