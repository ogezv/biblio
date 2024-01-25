<?php 


class Utils
{

    public static function uploadFile($file, $dir)
    {
        try {
            // récupération extension
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            $extensionValidesTab = ["jpg", "jpeg", "png", "gif", "webp"];
            // renomage fichier
            // $random = rand(0, 999999999);
            $random = time(); // timestamp
            $nomImage = $random . "_" . $file['name'];
            $target_file = $dir . $nomImage;

            // vérif image
            if (!isset($file['name']) || empty($file['name'])) throw new Exception("Vous devez sélectionner une image");

            // création du répertoire /images si inexistant
            if (!file_exists($dir)) mkdir($dir, 0777);

            // poids image => 2 Mo max
            // https://www.generationcyb.net/convertisseur-octet-ko-mo-go-to/
            if ($file['size'] > 2097152) throw new Exception("Le fichier est trop volumineux!");

            // vérification extension autorisées
            if (!in_array($extension, $extensionValidesTab)) throw new Exception("L'extension $extension n'est pas autorisée!");

            // erreur copie
            if (!move_uploaded_file($file['tmp_name'], $target_file)) throw new Exception("L'ajout de l'image n'a pas fonctionné!");

            else return $nomImage;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
