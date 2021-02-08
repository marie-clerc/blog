<?php

require_once ('../../libraries/autoload.php');

require ('../../libraries/Articles.php');

$css = "css/articles.css";

ob_start();

$triCategorie = new Articles();
$tab = $triCategorie ->getAllCategories();

?>

<main>
    <article>
        <section class="container-fluid">
            <section class="main-cont">
                <section class="categories">
                    <h3>Choix des catégories</h3>
                    <form action="articles.php" method="get">
                        <label for="Choix">Choix</label>
                        <select name="Choix" >

                            <?php

                            $i=0;

                            foreach ($tab as $value){

                                echo '<option value="'.$value[1].'">' . $value[1] . '</option>';
                            }

                            $i++;
                            ?>

                        </select>
                        <input type="submit" name="search">
                    </form>
                </section>
                <section class="article1">
                    <?php

                    if(isset($_GET['search'])){

                        $affichage = $triCategorie->getChoix($_GET['Choix']);

                        foreach ($affichage as $value){

                            $_GET['id'] = $value[0];

                            echo '<h2>' . $value[1] . '</h2>
                                   <p>' . substr($value[2],0,150) . '</p>
                                   <p> Posté le : ' . $value[5] . '</p>
                                   <a href="article.php?id=' . $_GET['id'] . '"> Lire l\'article en entier !</a><hr>';
                        }
                    }
                    else{
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
