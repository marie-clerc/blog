<?php
require_once('../../libraries/autoload.php'); //charge TOUTES les class
require '../../libraries/article.php';
// session_start();
$article = new article();
// $_SESSION['article'] = $article;
$article->createarticle();
?>

<?php $css = "css/creer-article.css"; ?> <!--lien du css-->

<?php ob_start();?> <!--début du tampon, ??? -->

    <div class="main">
        <form action="creer-article.php" method="post">
            <div class="card creer" style="width: 100%">
                <div class="card-body">
                    <label for="title"><h5>Titre de votre article</h5></label><br>
                    <input type="text" name="title" placeholder="titre" autofocus><br>
                    <label for="article"><h5>Article</h5></label><br>
                    <textarea name="article" rows="5" class="form-control text"></textarea><br>
                    <label for="categorie"><h5>Catégories</h5></label><br>
                    <select name="categories" class="form-select" aria-label="Choisir une catégorie">
                       <?php
                            $nom = $article->findcategories();
                            foreach ($nom as $value ) {
                                    echo '<option >'. $value[1] .'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" name="submit" value="Créer">
                </div>
            </div>
        </form>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>