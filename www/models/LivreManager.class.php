<?php
require_once "models/ConnexionManager.class.php";
require_once "models/Livre.class.php";

class LivreManager extends ConnexionManager
{
    private array $livres;

    public function ajouterLivre($nouveauLivre)
    {
        $this->livres[] = $nouveauLivre;
    }

    public function chargementLivres($id)
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM livre where id_user = $id");
        // $req = $connexion->prepare("SELECT * FROM livre");
        $req->execute();
        $livreImportes = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($livreImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['titre'], $livre['image'], $livre['nb_pages']);
            $this->ajouterLivre($nouveauLivre);
        }
    }

    /**
     * Get the value of livres
     *
     * @return array
     */
    public function getLivres(): array
    {
        return $this->livres;
    }
}
