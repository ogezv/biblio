<?php
require_once "ConnexionManager.class.php";
require_once "UserManager.class.php";

class LoginManager extends UserManager
{
    private function initSessionUser()
    {
        $userManager = new UserManager;
        if (isset($_POST['identifiant'])) {
            $userManager->setUser($_POST['identifiant'], $_POST['password']);
            $userEnCours = $userManager->getUser();
            if ($userEnCours != null) {
                foreach ($userEnCours as $attribut => $valeur) {
                    $_SESSION[$attribut] = $valeur;
                }
            }
        }
    }
}
