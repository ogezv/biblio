<?php
require_once "models/UserManager.class.php";
$userManager = new UserManager;

if (isset($_SESSION['user'])) {
    header('location: livres');
}

if (isset($_POST['identifiant'])) {
    $userManager->setUser($_POST['identifiant'], $_POST['password']);
    $userEnCours = $userManager->getUser();
    if ($userEnCours != null) {
        foreach ($userEnCours as $attribut => $valeur) {
            $_SESSION['user'][$attribut] = $valeur;
        }
        header('location: livres');
    }
}
?>

<?php ob_start() ?>
<form class="m-auto w-50" method="POST">
    <fieldset>
        <div class="form-group">
            <label for="identifiant" class="form-label mt-4">Identifiant</label>
            <input type="identifiant" class="form-control" name="identifiant" id="identifiant" aria-describedby="identifiantHelp" placeholder="Entrez votre identifiant">
        </div>
        <div class="form-group">
            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" autocomplete="off">
        </div><br>
        <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Connexion";
require_once "template.view.php";
