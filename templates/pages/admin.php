<?php
require_once('../../libraries/autoload.php');
require('../../libraries/Admin.php');

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

if (!isset($_SESSION['id']))
{
    Http::redirect('connexion.php');
    exit();
}

$adminManager = new Admin();

?>

<?php if (isset($_SESSION['id'])){$btnLogout = '<form method="POST" action="admin.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';}else{$btnLogout = NULL;} ?>

<?php $css = "css/admin.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <section class="container-fluid admin-content">
            <section class="d-flex align-items-start">
                <section class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Gestion Articles</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Gestion Catégories</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Gestion Utilisateurs</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Accès & Droits</a>
                </section>
                <section class="tab-content" id="v-pills-tabContent">
                    <section class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-articles-tab">
                        <table>
                            <thead>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Article</th>
                            <th>Id_utilisateur</th>
                            <th>Id_catégorie</th>
                            <th>Date</th>
                            </thead>
                            <tbody>
                            <?php
                            $articles = $adminManager -> getAllArticles();

                            foreach ($articles as $allArticles)
                            {
                                echo ('<form action="admin.php" method="get"><tr><td>' . $allArticles['id'] . '</td>
                                           <td>' . $allArticles['titre'] . '</td>
                                           <td>' . $allArticles['article'] . '</td>
                                           <td>' . $allArticles['id_utilisateur'] . '</td>
                                           <td>' . $allArticles['id_categorie'] . '</td>
                                           <td>' . $allArticles['date'] . '</td>
                                           <td>
                                            <input type="submit" class="btn btn-primary btn-Article" id="modify_Article" name="modifyArticle" value="Modifier">
                                            <input type="hidden" id="hiddenModifyArticle" name="hiddenModifyArticle" value="' . $allArticles['id'] . '">
                                            
                                            <input type="submit" class="btn btn-danger btn-Article" id="delete_Article" name="deleteArticle" value="Supprimer">
                                            <input type="hidden" id="hiddenDeleteArticle" name="hiddenDeleteArticle" value="' . $allArticles['id'] . '">
                                           </td>
                                       </tr></form>');
                            }
                            ?>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_GET['modifyArticle']))
                        {
                            $adminManager -> displayUpdateArticle($_GET['hiddenModifyArticle']);
                        }
                        /* Faire une fonction qui permet d'autoremplir le formulaire de modification d'article propre à l'id selectionné */
                        ?>
                    </section>
                    <section class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-categories-tab"></section>
                    <section class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-users-tab"></section>
                    <section class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-access&roles-tab"></section>
                </section>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>