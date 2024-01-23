<?php ob_start() //buffer démarré 
?>

<div class="card mb-3">
  <h3 class="card-header"<?= $livreEnCours->getTitre() ?>></h3>
  <img src="<?= SITE_URL?>public/images/<?= $livreEnCours->getImage() ?>" alt="<?= $livreEnCours->getTitre()?>">
  <div class="card-body">
    <p class="card-text">Livre pour <?= $livreEnCours->getTitre()?></p>
  </div>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>

<?php
// buffer restitué
$content = ob_get_clean();
$titre = $livreEnCours->getTitre();

require_once "views/templates/template.view.php";