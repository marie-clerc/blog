<?php require_once ('../../libraries/autoload.php'); ?>

<?php require ('../../libraries/Articles.php') ?>

<?php $css = "css/articles.css"; ?>

<?php ob_start(); ?>


<main>
    <article>
        <section class="container-fluid">
            <section class="main-cont">
                <section class="categories">
                    <h3>Choix des catégories</h3>
                    <p> les jeunes</p>
                    <p>politique</p>
                    <p>restrictions ...</p>
                </section>
                <section class="article1">
                    <?php
                    $affichageA = new Articles();
                    $affichageA ->pages();
                    ?>
                </section>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>
