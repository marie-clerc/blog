<?php
require_once('../../libraries/autoload.php');

if (isset($_POST['register']))
{
   $createUser = new User();
   $createUser -> register();
}

?>

<?php $css = "css/inscription.css"; ?>

<?php ob_start(); ?>

    <main>
        <article>
            <section class="container register-content">
                <section class="container-fluid register-form">
                    <section class="register-image">
                        <i class="fas fa-user"></i>
                    </section>
                    <form action="inscription.php" method="post">
                        <h3>S'inscrire</h3>
                        <section class="row">
                            <section class="col-md-6">
                                <section class="form-group">
                                    <input type="text" name="login" id="login" class="form-control" placeholder="Your Name *" required>
                                </section>
                                <section class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password *" required>
                                </section>
                                <section class="form-group">
                                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Your Password *" required>
                                </section>
                                <section class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email *" required>
                                </section>
                                <section class="form-group">
                                    <input type="submit" name="register" id="register" class="btnRegister" value="Créer son compte">
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