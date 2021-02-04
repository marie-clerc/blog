<?php
require_once('../../libraries/autoload.php'); //charge TOUTES les class
require '../../libraries/article.php';
// session_start();
$article = new article();
// $_SESSION['article'] = $article;
$article->createarticle();
?>

<?php $css = "css/inscription.css"; ?> <!--lien du css-->

<?php ob_start();?> <!--début du tampon, ??? -->

    <form action="creer-article.php" method="post">

        <label for="title">Titre de votre article</label><br>
        <input type="text" name="title" placeholder="titre" autofocus><br>
        <label for="article">Article</label><br>
        <textarea name="article"></textarea><br>
        <label for="categorie">Catégories</label><br>
        <select name="categories">
            <option value="">Sélectionner</option>
            <?php
                $nom = $article->findcategories();
                foreach ($nom as $value ) {
                        echo '<option>'. $value[1] .'</option>';
                }
            ?>
        </select>
        <input type="submit" name="submit" value="Créer">
    </form>
<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>