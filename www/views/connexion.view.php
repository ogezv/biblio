<?php
require_once "LoginManager.class.php";
require_once "UserManager.class.php";

if (isset($_POST['identifiant'])) {
    var_dump($_POST);
    $loginManager = new LoginManager();
    $loginManager->connexionUser($_POST['identifiant'], $_POST['password']);
}


?>

<?php ob_start() ?>

<form method="POST">
    <fieldset>
        <div class="form-group">
            <label for="identifiant" class="form-label mt-4">Identifiant</label>
            <input type="identifiant" class="form-control" name="identifiant" id="identifiant" aria-describedby="emailHelp" placeholder="Entrez votre identifiant">
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
