<?php 
// session_start();
require_once "User.class.php";
require_once "UserManager.class.php";

$userManager=new UserManager;
$userManager->setUser();



?>

<?php ob_start() ?>

<?php foreach ($userManager->getUser() as $user) : ?>
    <?php echo $user->getidentifiant(); ?>
<?php endforeach ?>

<?php
$content = ob_get_clean();
$titre = "Mon profil";
require_once "template.view.php";