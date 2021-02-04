<?php
require_once('../../libraries/autoload.php');
session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

?>

<?php if (isset($_SESSION['id'])){$btnLogout = '<form method="POST" action="index.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';}else{$btnLogout = NULL;} ?>

<?php $css = "css/index.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <h1 style="text-align: center">GUILLAUME, J'ATTENDS TON CODE :P</h1>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>
