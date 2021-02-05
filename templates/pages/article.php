<?php
require_once('../../libraries/autoload.php'); //charge TOUTES les class
require '../../libraries/articles.php';
session_start() ;
// $article = $_SESSION['article'];
$articles = new Articles();
?>

<?php $css = "css/inscription.css"; ?> <!--lien du css-->

<?php ob_start();?>

<?php
$mainarticle = $articles->showarticle($_GET['id']);
    foreach ($mainarticle as $value ) {
        echo $value['titre'] .'<br>' . $value['date'] .'<br>' . $value['login'] .'<br>' . $value['article'] .'<br>';
        //var_dump($_GET);
    }

$commentaire = $articles->showcomments($_GET['id']);
    foreach ($commentaire as $value ) {
        echo $value['commentaire'] .'<br>' . $value['date'] .'<br>' . $value['login'] .'<br>';
        //var_dump($value);
    }
$articles->writecomments($_GET['id']);
?>
<form action="article.php" method="post">
    <label for="comment">Poster un commentaire</label><br>
    <textarea name="comment"></textarea><br>
    <input type="submit" name="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>


