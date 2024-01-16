<?php ob_start() ?>

<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure voluptate natus a dignissimos eos sint maiores deserunt nostrum dolore nesciunt velit doloribus, ducimus nemo fugit placeat vel error ipsam rem.</p>

<?php
$content = ob_get_clean();
$titre = "Accueil";
require_once "template.view.php";
