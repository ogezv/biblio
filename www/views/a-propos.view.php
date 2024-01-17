<?php session_start(); ?>
<?php ob_start() ?>

<h1>A propos ma</h1>

<?php
$titre="A propos";
$content= ob_get_clean();
require_once "template.view.php";