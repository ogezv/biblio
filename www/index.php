<?php

if (empty($_GET['page'])) {
    require "views/accueil.view.php";
} else {
    switch ($_GET['page']) {
        case 'accueil':
            require "views/accueil.view.php"; // Appel de la vue accueil
            break;
        case 'livres':
            require "views/livres.view.php"; // Appel de la vue livres
            break;
        case 'a-propos':
            require "views/a-propos.view.php"; // Appel de la vue a propos
            break;
        default:
            require "views/error.view.php";
            break;
    }
}
