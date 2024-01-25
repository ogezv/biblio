<?php
session_start();
define("SITE_URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "models/users/UserManager.class.php";
require_once "controllers/livres/LivresController.controller.php";
require_once "controllers/users/UsersController.controller.php";
$userManager = new UserManager;
$livreController = new LivresController;
$userController = new UsersController;

// routeur
try {
    if (empty($_GET['page'])) {
        $livreController->afficherLivresAll();
    } else {
        // $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case 'accueil':
                $livreController->afficherLivresAll(); // Appel de la vue accueil
                break;
            case 'livres':
                if (empty($url[1])) {
                    $livreController->afficherLivres(); // Appel de la vue livres
                } else if ($url[1] === "l") {
                    $livreController->afficherLivre(intval($url[2])); // appel controller
                } else if ($url[1] === "a") {
                    $livreController->ajoutLivre();
                } else if ($url[1] === "av") {
                    $livreController->ajoutLivreValidation();
                } else if ($url[1] === "m") {
                    $livreController->modifierLivre(intval($url[2]));
                } else if ($url[1] === "mv") {
                    $livreController->modifierLivreValidation();
                } else if ($url[1] === "s") {
                    $livreController->supprimerLivre(intval($url[2]));
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case 'a-propos':
                $userController->aPropos(); // Appel de la vue a propos
                break;
            case 'connexion':
                $userController->connexion(); // Appel de la vue a propos
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
    $livreController->afficherError();
}
