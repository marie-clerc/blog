<?php
require_once('../../libraries/autoload.php');
require('../../libraries/Admin.php');

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

$test = new Admin();
$test -> modifyArticles();

?>

<?php if (isset($_SESSION['id'])){$btnLogout = '<form method="POST" action="admin.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';}else{$btnLogout = NULL;} ?>

<?php $css = "css/admin.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <section class="container admin__content">
            <section class="d-flex align-items-start">
                <section class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Gestion Articles</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Gestion Catégories</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Gestion Utilisateurs</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Accès & Droits</a>
                </section>
                <section class="tab-content" id="v-pills-tabContent">
                    <section class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-articles-tab">
                        <form action="admin.php" method="post">
                            <label for="allArticles"></label>
                            <select>
                                <?php
                                    $name = $test -> showArticles();
                                    foreach ($name as $value)
                                    {
                                        echo ('<option>' . $value['titre'] . '</option>');
                                    }

                                ?>
                            </select>
                            <label for="modifyArticles"></label>
                            <input type="submit" id="modifyArticles" name="modifyArticles" value="Selectionner">
                            <section>
                                <?php
                                if (isset($_POST['modifyArticles']))
                                {
                                    echo ('
                                    <form action="admin.php" method="post">
                                        <section><input type="text" id="newTitle" name="newTitle" placeholder="Nouveau Titre"></section>
                                        <section><input type="text" id="newArticle" name="newArticle" placeholder="Nouvel Article"></section>
                                        <section><input type="submit" id="validNewArticle" name="validNewArticle" value="Modifier"></section>
                                    </form>
                                    ');
                                }
                                ?>
                            </section>
                        </form>
                    </section>
                    <section class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-categories-tab">

                    </section>
                    <section class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-users-tab">

                    </section>
                    <section class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-access&roles-tab">

                    </section>
                </section>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>