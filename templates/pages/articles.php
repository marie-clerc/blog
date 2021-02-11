<?php

require_once ('../../libraries/autoload.php');

require ('../../libraries/Articles.php');

session_start();
if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}
?>

<?php $css = "css/articles.css"; ?>

<?php ob_start(); ?>

    <main>
        <article>
            <section class="container-fluid">
                <section class="main-cont">
                    <section class="categories">
                        <h3><i class="fas fa-list-ol"></i> Choix des catégories</h3>
                        <p>Vers quelle catégorie d'articles souhaitez vous aller ?</p>
                        <form action="articles.php" method="get">
                            <section class="box">
                                <select name="Choix">
                                    <?php

                                    $triCategorie = new Articles();
                                    $tab = $triCategorie ->getAllCategories();

                                    $i=0;

                                    foreach ($tab as $value){

                                        echo '<option value="'.$value[1].'">' . $value[1] . '</option>';
                                    }

                                    $i++;

                                    ?>
                                </select>
                                <input class="valid" type="submit" name="search" value="Go !">
                            </section>
                        </form>
                    </section>
                    <section class="article1">
                        <?php

                        if(isset($_GET['search'])){

                            $_GET['id'] = $value[0];

                            $affichage = $triCategorie->getChoix($_GET['Choix'],$_GET['id']);

                            foreach ($affichage as $value){

                                echo '<h2>' . $value[1] . '</h2>
                                   <p>' . substr($value[2],0,150) . '</p>
                                   <p> Posté le : ' . $value[5] . '</p>
                                   <i class="fas fa-arrow-right"></i> <a href="article.php?id=' . $_GET['id'] . '"> Lire l\'article en entier !</a><hr>';

                            }
                        }
                        else{
                            echo '<h1><i class="fas fa-stream"></i> Tout les articles</h1><br>';
                            $affichageA = new Articles();
                            $affichageA ->pagesArticles();
                        }

                        ?>
                    </section>
                </section>
            </section>
        </article>
    </main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>