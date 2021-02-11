<?php
require_once('../../libraries/autoload.php'); //charge TOUTES les class
require '../../libraries/articles.php';
session_start() ;
// $article = $_SESSION['article'];
$articles = new Articles();
$articles->writecomments($_GET['id']);
?>

<?php $css = "css/creer-article.css"; ?> <!--lien du css-->

<?php ob_start();?>
<div class="main">
    <?php
    $mainarticle = $articles->showarticle($_GET['id']);
    foreach ($mainarticle as $value ) {
        echo '<div class="card postarticle"><div class="card-body">
                            <h5 class="card-title">'. $value['titre'] .'</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Ecrit par : '. $value['login'] .' le : ' . $value['date'] .'</h6>
                            <p class="card-text">'. $value['article'] .'</p></div></div>';
        //var_dump($_GET);
    }
    ?>
    <div class="commentaires">
        <h6>Commentaires : </h6>
        <?php
        $commentaire = $articles->showcomments($_GET['id']);
        foreach ($commentaire as $value ) {
            echo '<div class="card mb-3" style="width: 100%">
                              <div class="row g-0">
                                <div class="col-md-4">
                                        <h5 class="card-title">' . $value['login'] . '</h5>
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <p class="card-text">'. $value['commentaire'] .'</p>
                                    <p class="card-text"><small class="text-muted">'. $value['date'] .'</small></p>
                                  </div>
                                </div>
                              </div>
                            </div>';
            //var_dump($value);
        }
        ?>
    </div>

    <div class="post">
        <form action="article.php?id=<?php echo $_GET['id']; ?>" method="post">
            <label for="comment"><h6>Poster un commentaire :</h6></label><br>
            <textarea name="comment" rows="5" class="form-control text"></textarea><br>
            <input type="submit" name="submit" value="Envoyer">
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>
