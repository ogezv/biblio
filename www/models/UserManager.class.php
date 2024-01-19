<?php
require_once "models/ConnexionManager.class.php";
require_once "models/User.class.php";

class UserManager extends ConnexionManager
{

    protected User $user;

    public function setUser($identifiant, $password)
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM user");
        $req->execute();
        $users = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($users as $user) {
            if ($user['identifiant'] === $identifiant) {
                if (password_verify($password, $user['password'])) {
                    $user = new User($user['id_user'], $user['identifiant'], $user['password']);
                    return $this->user=$user;
                }
            }
        }
    }

    public function deconnexion(){
        session_destroy();
        header ('location: /');
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
