<?php
require_once "models/utils/ConnexionManager.class.php";
require_once "models/livres/Livre.class.php";

class LivreManager extends ConnexionManager
{
    private array $livres = [];

    public function ajouterLivre($nouveauLivre)
    {
        $this->livres[] = $nouveauLivre;
    }

    public function chargementLivres($id_user)
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM livre where id_user = $id_user");
        // $req = $connexion->prepare("SELECT * FROM livre");
        $req->execute();
        $livreImportes = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($livreImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['titre'], $livre['image'], $livre['nb_pages']);
            $this->ajouterLivre($nouveauLivre);
        }
    }

    public function chargementLivresAll()
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM livre l left join user u ON l.id_user = u.id_user");
        $req->execute();
        $this->livres = [];
        $livreImportes = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($livreImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['titre'], $livre['image'], $livre['nb_pages'], $livre['identifiant'] != null ? $livre['identifiant'] : "Pas d'uploader");
            $this->ajouterLivre($nouveauLivre);
        }
    }

    public function getLivreById($id_livre)
    {
        foreach ($this->livres as $livre) {
            if ($livre->getId() === $id_livre) {
                return $livre;
            }
        }
    }

    public function ajoutLivreBdd($titre, $nbPages, $monImage, $id_user)
    {
        $req = "INSERT INTO livre (titre, nb_pages, image, id_user)
        VALUES(:titre, :nbPages, :monImage, :id_user)";
        $stmt = $this->getConnexionBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":monImage", $monImage, PDO::PARAM_STR);
        $stmt->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
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
