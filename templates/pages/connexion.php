<?php
require_once('../../libraries/autoload.php');

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

if (isset($_POST['connect']))
{
    session_start();
    $connectUser = new User();
    $connectUser -> connect();
}

?>

<?php $btnLogout = NULL; ?>

<?php $css = "css/connexion.css"; ?>

<?php ob_start(); ?>

    <main>
        <article>
            <section class="container register-content">
                <section class="container-fluid register-form">
                    <section class="register-image">
                        <i class="fas fa-user"></i>
                    </section>
                    <form action="connexion.php" method="post">
                        <h3>Se Connecter</h3>
                        <p style="text-align: center; margin-top: -5%;">Vous voulez exprimer votre ressenti sur la crise actuelle ? N'hésitez plus ! Vous êtes au bon endroit.</p>
                        <section class="row">
                            <section class="col-md-6">
                                <section class="form-group">
                                    <input type="text" name="login" id="login" class="form-control" placeholder="Your Name *" required>
                                </section>
                                <section class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password *" required>
                                </section>
                                <section class="form-group">
                                    <input type="submit" name="connect" id="connect" class="btnConnect" value="Se connecter">
                                </section>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </article>
    </main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>