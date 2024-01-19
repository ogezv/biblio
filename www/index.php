<?php
session_start();
define("SITE_URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "models/UserManager.class.php";
require_once "controllers/LivresController.controller.php";
require_once "controllers/UserController.controller.php";
$userManager = new UserManager;
$livreController = new LivresController;

// routeur
try {
    if (empty($_GET['page'])) {
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case 'accueil':
                require "views/accueil.view.php"; // Appel de la vue accueil
                break;
            case 'livres':
                if (empty($url[1])) {
                    $livreController->afficherLivres(); // Appel de la vue livres
                } else if ($url[1] === "l") {
                    echo "Afficher livre"; // appel controller
                } else if ($url[1] === "a") {
                    echo "Ajout livre";
                } else if ($url[1] === "m") {
                    echo "Modifier livre";
                } else if ($url[1] === "s") {
                    echo "Supprimer livre";
                } else {
                    throw new Exception("La page n'existe pas");
                }
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
            default:
                throw new Exception("La page n'existe pas");
                break;
        }
    }
} catch (Exception $e) {
    // echo $e->getMessage();
    require "views/error.view.php";
}
