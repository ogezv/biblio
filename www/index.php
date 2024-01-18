<?php
session_start();
require_once "UserManager.class.php";
$userManager=new UserManager;
// routeur
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
        case 'connexion':
            require "views/connexion.view.php"; // Appel de la vue a propos
            break;
        case 'deconnexion':
            $userManager->deconnexion();
            break;
        case 'profil':
            require "views/profil.view.php"; // Appel de la vue a propos
            break;
        default:
            require "views/error.view.php";
            break;
    }
}
