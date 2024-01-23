<?php
require_once "models/livres/LivreManager.class.php";
require_once "models/utils/Utils.class.php";

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
        $livresEnCours = $this->livresManager->getLivres();

        require "views/livres/livres.view.php";
    }

    public function afficherLivre($id_livre)
    {
        $livreEnCours = $this->livresManager->getLivreById($id_livre);
        require ($livreEnCours != null) ? "views/livres/afficherLivre.view.php" : "views/error/error.view.php";
    }

    public function afficherLivresAll()
    {
        $pasDeLivre = false;
        $this->livresManager->chargementLivresAll();
        $livresAll = $this->livresManager->getLivres();
        if (count($livresAll) === 0) {
            $pasDeLivre = true;
        }
        require "views/accueil.view.php";
    }

    public function afficherError()
    {
        require "views/error/error.view.php";
    }

    public function ajoutLivre()
    {
        require "views/livres/afficherAjoutLivre.view.php";
    }

    public function ajoutLivreValidation()
    {
        $image = $_FILES['image'];
        $repertoire = "public/images/";
        $monImage = Utils::uploadFile($image, $repertoire);
        // envoie BDD
        $this->livresManager->ajoutLivreBdd($_POST['titre'], intval($_POST['nbPages']), $monImage, $_SESSION['user']['id']);
        // appeler vue
        header('location: ' . SITE_URL . 'livres');
    }

    // public function ajoutFile($file, $dir)
    // {
    //     Utils::uploadFile($file, $dir);
    // }
}
