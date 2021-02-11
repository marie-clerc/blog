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
                        <a class="nav-link" id="v-pills-comments-tab" data-bs-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">Gestion Commentaires</a>
                        <a class="nav-link" id="v-pills-users-tab" data-bs-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">Gestion Utilisateurs</a>
                    </section>
                    <section class="tab-content" id="v-pills-tabContent">
                        <!-- GESTION DES ARTICLES -->
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
                                    echo ('<form action="" method="get">
                                           <tr>
                                               <td style="text-align: center">' . $allArticles['id'] . '</td>
                                               <td style="padding-left: 0.2%;">' . $allArticles['titre'] . '</td>
                                               <td style="padding-left: 0.2%;">' . $allArticles['article'] . '</td>
                                               <td style="text-align: center">' . $allArticles['id_utilisateur'] . '</td>
                                               <td style="text-align: center">' . $allArticles['id_categorie'] . '</td>
                                               <td style="text-align: center">' . $allArticles['date'] . '</td>
                                               <td style="border: none;">
                                                   <input type="submit" class="btn btn-primary input-Article" id="modify_Article" name="modifyArticle" value="Modifier">
                                                   <input type="hidden" id="hiddenModifyArticle" name="hiddenModifyArticle" value="' . $allArticles['id'] . '">
                                                            
                                                   <input type="submit" class="btn btn-danger input-Article" id="delete_Article" name="deleteArticle" onclick="return confirm(\'Etes vous sûre de vouloir supprimer cet article ?\');" value="Supprimer">
                                                   <input type="hidden" id="hiddenDeleteArticle" name="hiddenDeleteArticle" value="' . $allArticles['id'] . '">
                                               </td>
                                           </tr>
                                           </form>');
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

                            if (isset($_GET['deleteArticle']))
                            {
                                $adminManager -> deleteArticle($_GET['hiddenDeleteArticle']);
                            }
                            ?>
                        </section>
                        <!-- GESTION DES CATEGORIES -->
                        <section class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-categories-tab">
                            <table>
                                <thead>
                                <th><?php echo ('<form action="" method="get"><input type="submit" class="btn btn-success" id="create_Category" name="createCategory" value="Ajouter"></form>'); ?></th>
                                <th>#</th>
                                <th>Nom</th>
                                </thead>
                                <tbody>
                                <?php
                                $categories = $adminManager -> getAllCategories();

                                foreach ($categories as $allCategories)
                                {
                                    echo ('<form action="" method="get">
                                           <tr>
                                               <td style="text-align: center">' . $allCategories['id'] . '</td>
                                               <td style="padding-left: 0.3%;">' . $allCategories['nom'] . '</td>
                                               <td style="border: none;">
                                                   <input type="submit" class="btn btn-primary input-Category" id="modify_Category" name="modifyCategory" value="Modifier">
                                                   <input type="hidden" id="hiddenModifyCategory" name="hiddenModifyCategory" value="' . $allCategories['id'] . '">
                                                            
                                                   <input type="submit" class="btn btn-danger input-Category" id="delete_Category" name="deleteCategory" onclick="return confirm(\'Etes vous sûre de vouloir supprimer cette catégorie ?\');" value="Supprimer">
                                                   <input type="hidden" id="hiddenDeleteCategory" name="hiddenDeleteCategory" value="' . $allCategories['id'] . '">
                                               </td>
                                           </tr>
                                           </form>');
                                }
                                ?>
                                </tr>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_GET['modifyCategory']))
                            {
                                $adminManager -> displayUpdateCategory($_GET['hiddenModifyCategory']);
                            }

                            if (isset($_GET['deleteCategory']))
                            {
                                $adminManager -> deleteCategory($_GET['hiddenDeleteCategory']);
                            }

                            if (isset($_GET['createCategory']))
                            {
                                $adminManager -> displayCreateCategory();
                            }
                            ?>
                        </section>
                        <!-- GESTION DES COMMENTAIRES -->
                        <section class="tab-pane fade" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">
                            <table>
                                <thead>
                                <th>#</th>
                                <th>Commentaire</th>
                                <th>Id_article</th>
                                <th>Id_utilisateur</th>
                                <th>Date</th>
                                </thead>
                                <tbody>
                                <?php
                                $comments = $adminManager -> getAllComments();

                                foreach ($comments as $allComments)
                                {
                                    echo ('<form action="" method="get">
                                           <tr>
                                               <td style="text-align: center">' . $allComments['id'] . '</td>
                                               <td style="padding-left: 0.2%">' . $allComments['commentaire'] . '</td>
                                               <td style="text-align: center">' . $allComments['id_article'] . '</td>
                                               <td style="text-align: center">' . $allComments['id_utilisateur'] . '</td>
                                               <td style="text-align: center">' . $allComments['date'] . '</td>
                                               <td style="border: none;">  
                                                   <input type="submit" class="btn btn-danger input-Comment" id="delete_Comment" name="deleteComment" onclick="return confirm(\'Etes vous sûre de vouloir supprimer le commentaire selectionné ?\');" value="Supprimer">
                                                   <input type="hidden" id="hiddenDeleteComment" name="hiddenDeleteComment" value="' . $allComments['id'] . '">
                                               </td>
                                           </tr>
                                           </form>');
                                }
                                ?>
                                </tr>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_GET['deleteComment']))
                            {
                                $adminManager -> deleteComment($_GET['hiddenDeleteComment']);
                            }
                            ?>
                        </section>
                        <!-- GESTION DES UTILISATEURS -->
                        <section class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                            <table>
                                <thead>
                                <th>#</th>
                                <th>Login</th>
                                <th>Password</th>
                                <th>E-mail</th>
                                <th>id_droits</th>
                                </thead>
                                <tbody>
                                <?php
                                $users = $adminManager -> getAllUsers();

                                foreach ($users as $allUsers)
                                {
                                    echo ('<form action="" class="user_table" method="get">
                                           <tr>
                                               <td style="text-align: center">' . $allUsers['id'] . '</td>
                                               <td style="padding-left: 0.2%">' . $allUsers['login'] . '</td>
                                               <td style="padding-left: 0.2%">' . $allUsers['password'] . '</td>
                                               <td style="padding-left: 0.2%">' . $allUsers['email'] . '</td>
                                               <td style="text-align: center">' . $allUsers['id_droits'] . '</td>
                                               <td style="border: none;">
                                                   <input type="submit" class="btn btn-primary input-User" id="modify_User" name="modifyUser" value="Modifier">
                                                   <input type="hidden" id="hiddenModifyUser" name="hiddenModifyUser" value="' . $allUsers['id'] . '">
                                                            
                                                   <input type="submit" class="btn btn-danger input-User" id="delete_User" name="deleteUser" onclick="return confirm(\'Etes vous sûre de vouloir supprimer le compte selectionné ?\');" value="Supprimer">
                                                   <input type="hidden" id="hiddenDeleteUser" name="hiddenDeleteUser" value="' . $allUsers['id'] . '">
                                               </td>
                                           </tr>
                                           </form>');
                                }
                                ?>
                                </tr>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_GET['modifyUser']))
                            {
                                $adminManager -> displayUpdateusers($_GET['hiddenModifyUser']);
                            }

                            if (isset($_GET['deleteUser']))
                            {
                                $adminManager -> deleteUser($_GET['hiddenDeleteUser']);
                            }
                            ?>
                        </section>
                    </section>
                </section>
            </section>
        </article>
    </main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>