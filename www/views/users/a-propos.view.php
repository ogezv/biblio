
<?php ob_start() ?>


<?php
$titre = "A propos";
$content = ob_get_clean();
require_once "views/templates/template.view.php";
if (isset($_SESSION['user'])) echo "A propos de " . $_SESSION['user']['identifiant'];