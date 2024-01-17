<?php
require_once "ConnexionManager.class.php";
require_once "User.class.php";

class UserManager extends ConnexionManager {

    protected array $users;
    
    public function ajouterUtilisateur($nouveauUser){
        $this->users[] = $nouveauUser;
    }

    public function chargementUser(){
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM user limit 0,5");
        $req->execute();
        $usersConnexion = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($usersConnexion as $user){
            $nouveauUser = new User($user['id_user'], $user['identifiant'],$user['password'],$user['is_valide']);
            $this->ajouterUtilisateur($nouveauUser);
           
        }
    }


    public function getusers(): array {
        return $this->users;
    }
}
?> 