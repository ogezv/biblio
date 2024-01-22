<?php
require_once "models/LivreManager.class.php";

class LivresController
{
    private $livresManager;

    public function __construct()
    {
        // logique "vue" livres
        $this->livresManager = new LivreManager;
        if (isset($_SESSION['user'])) {
            $id_user = $_SESSION['user']['id'];
            $this->livresManager->chargementLivres($id_user);
        } 
    }

    public function afficherLivres()
    {
        // $livreEnCours = $this->livresManager;
        $livresEnCours = $this->livresManager->getLivres();
        require "views/livres.view.php";
    }

    public function afficherLivre($id_livre)
    {
        $livreEnCours = $this->livresManager->getLivreById($id_livre);
        require ($livreEnCours != null) ? "views/afficherLivre.view.php" : "views/error.view.php";
    }
}
