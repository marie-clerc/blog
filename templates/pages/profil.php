<?php
require_once('../../libraries/autoload.php');
session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

if (isset($_POST['update']))
{
    $updateUser = new User();
    $updateUser -> update();
}

?>

<?php if (isset($_SESSION['id'])){$btnLogout = '<form method="POST" action="profil.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';}else{$btnLogout = NULL;} ?>

<?php $css = "css/profil.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <section class="container rounded bg-white mt-5">
            <section class="row modify-content">
                <section class="col-md-4 border-right">
                    <section class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <i class="fas fa-user" style="font-size: 150px"></i>
                        <span class="font-weight-bold"><?php if (isset($_SESSION['id'])){ echo $_SESSION['login']; } ?></span>
                        <span class="text-black-50"><?php if (isset($_SESSION['id'])){ echo $_SESSION['email']; } ?></span>
                    </section>
                </section>
                <section class="col-md-8">
                    <section class="p-3 py-5">
                        <section class="d-flex justify-content-between align-items-center mb-3">
                            <section class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i><h6><a href="index.php" style="text-decoration: none">Back to home</a></h6></section>
                            <h6 class="text-right">Edit Profile</h6>
                        </section>
                        <form action="profil.php" method="post">
                            <section class="row mt-2">
                                <section class="col-md-6">
                                    <input type="text" class="form-control" name="newLogin" id="newLogin" placeholder="Name" value="<?php if (isset($_SESSION['id'])){ echo $_SESSION['login']; } ?>" required>
                                </section>
                            </section>
                            <section class="row mt-2">
                                <section class="col-md-6">
                                    <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Password" required>
                                </section>
                            </section>
                            <section class="row mt-3">
                                <section class="col-md-6">
                                    <input type="password" class="form-control" name="newConfirmPassword" id="newConfirmPassword" placeholder="Confirm Password" required>
                                </section>
                            </section>
                            <section class="row mt-3">
                                <section class="col-md-6">
                                    <input type="email" class="form-control" name="newEmail" id="newEmail" placeholder="Email" value="<?php if (isset($_SESSION['id'])){ echo $_SESSION['email']; } ?>" required>
                                </section>
                            </section>
                            <section class="mt-5 text-right">
                                <button type="submit" class="btn btn-primary profile-button" id="update" name="update">Sauvegarder mon profil</button>
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>