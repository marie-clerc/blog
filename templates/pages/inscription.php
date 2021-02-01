<?php
require_once('../../libraries/autoload.php');


?>

<?php $css = "css/inscription.css"; ?>

<?php ob_start(); ?>

    <main>
        <article>
            <section class="container-fluid registration__content">
                <form action="" method="post">
                    <h1>INSCRIVEZ-VOUS !</h1>
                    <h3>Vous souhaitez vous exprimer sur votre situtation et en parler ? Inscrivez-vous et créer un article dès maintenant !</h3>
                    <label for="name">ENTREZ VOTRE NOM</label>
                    <input type="text" id="name" name="name">

                    <label for="email">ENTREZ VOTRE EMAIL</label>
                    <input type="email" id="email" name="email">

                    <label for="password">CREER UN MOT DE PASSE</label>
                    <input type="password" id="password">

                    <label>CONFIRMER LE MOT DE PASSE</label>
                    <input type="password">
                </form>
            </section>
        </article>
    </main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>