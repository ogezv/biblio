<?php
if (!isset($_SESSION['user'])) header("location: connexion");
?>

<?php ob_start() //buffer démarré 
?>

<table class="table table-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php foreach ($livresEnCours as $livre) : ?>
        <tr>
            <td class="align-middle"><img src="public/images/<?= $livre->getImage() ?>" height="100px" alt="Livre pour <?php echo $livre->getTitre(); ?>"></td>
            <td class="align-middle"><a href="<?= SITE_URL?>livres/l/<?= $livre->getId()?>"><?php echo $livre->getTitre(); ?></a></td>
            <td class="align-middle"><?php echo $livre->getNombrePages(); ?></td>
            <td class="align-middle"><a href="#" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="#" class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php endforeach ?>
</table>
<a href="#" class="btn btn-success d-block">Ajouter</a>

<?php
// buffer restitué
$content = ob_get_clean();
$titre = 'Livres de ' . $_SESSION['user']['identifiant'];

require_once "template.view.php";
// echo $_SESSION['user']['id'];