<!-- <?php session_start(); ?> -->
<?php ob_start() ?>

<h1>Contenu introuvable</h1>

<?php
$titre="Error";
$content= ob_get_clean();
require_once "template.view.php";