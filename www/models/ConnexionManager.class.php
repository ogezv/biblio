<?php
// modèle de classe pour la connexion BDD
abstract class ConnexionManager
{
    private static $connexion;

    // création connexion
    public static function setConnexionBdd()
    {
        self::$connexion = new PDO("mysql:host=$_ENV[MYSQL_HOST];dbname=$_ENV[MYSQL_DATABASE];chartset=utf8", $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);
        self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // getter connexion
    protected function getConnexionBdd()
    {
        // verif connexion
        if (self::$connexion === null) {
            self::setConnexionBdd();
        }
        return self::$connexion; // récupération connexion
    }
}
