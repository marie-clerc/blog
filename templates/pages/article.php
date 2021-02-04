<?php
require_once('../../libraries/autoload.php'); //charge TOUTES les class
require '../../libraries/article.php';
// session_start();
// $article = $_SESSION['article'];
$article = new article();
?>

<?php $css = "css/inscription.css"; ?> <!--lien du css-->

<?php ob_start();?>

<?php
$mainarticle = $article->showarticle();
    foreach ($mainarticle as $value ) {
        echo $value['titre'] .'<br>' . $value['date'] .'<br>' . $value['login'] .'<br>' . $value['article'] .'<br>';
        var_dump($value);
    }

$commentaire = $article->showcomments();
    foreach ($commentaire as $value ) {
        echo $value['commentaire'] .'<br>' . $value['date'] .'<br>' . $value['login'] .'<br>';
        //var_dump($value);
    }
?>
<form action="creer-article.php" method="post">

    <label for="comment">Commentaire</label><br>
    <textarea name="comment"></textarea><br>
    <input type="submit" name="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>


