<?php
require_once "ConnexionManager.class.php";
require_once "UserManager.class.php";

class LoginManager extends UserManager
{
    public function connexionUser($identifiant, $password)
    {
        $this->chargementUser();
        $users = $this-> users;
        foreach ($users as $user) {
            if ($user->getIdentifiant() === $identifiant && password_verify($password, $user->getPassword())) {
                $this->initSessionUser($user);
            }
        }
        // header('location: accueil');
    }

    private function initSessionUser(object $user)
    {
        $_SESSION['user'] = [
            'id_user' => $user->getId(),
            'identifiant' => $user->getIdentifiant(),
            'password' => $user->getPassword(),
            'is_valide' => $user->getIsValide()
        ];
    }
}
