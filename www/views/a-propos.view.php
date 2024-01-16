<?php ob_start() ?>

<h1>A propos de moi</h1>

<?php
$titre="A propos";
$content= ob_get_clean();
require_once "template.view.php";