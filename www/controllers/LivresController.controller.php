<?php
require_once "models/LivreManager.class.php";

class LivresController
{
    private $livresManager;

    public function __construct()
    {
        // logique "vue" livres
        $this->livresManager = new LivreManager;
        $this->livresManager->chargementLivres($_SESSION['user']['id']);
    }

    public function afficherLivres()
    {
        // $livreEnCours = $this->livresManager;
        $livresEnCours = $this->livresManager->getLivres();
        require "views/livres.view.php";
    }
}
