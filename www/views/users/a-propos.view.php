<?php ob_start() ?>

<?php if (isset($_SESSION['user'])) : ?>
    <div class="card my-3 mx-auto w-50" style="max-width: 100rem;">
        <div class="card-header">Profil</div>
        <div class="card-body">
            <p>Session de : <?= $_SESSION['user']['identifiant'] ?></p>
            <p>Adresse mail : <?= $_SESSION['user']['mail'] ?></p>
        </div>
    </div>
<?php endif ?>

<?php
$titre = "A propos";
$content = ob_get_clean();
require_once "views/templates/template.view.php";
