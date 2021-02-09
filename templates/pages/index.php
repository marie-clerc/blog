<?php require_once ('../../libraries/autoload.php'); ?>

<?php require ('../../libraries/Articles.php') ?>

<?php $css = "css/index.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <section class="container-fluid">
            <section class="main-cont">
                <section class="item1">
                    <h1>La détresse des jeunes face au covid, parlons en.</h1>
                </section>
                <section class="item2">
                    <h2><i class="fas fa-globe-europe"></i>  Nouveautés </h2>
                    <iframe src="https://www.youtube.com/embed/9XzBeUUATbE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p>Avec plus de 8 millions de vues, cette vidéo a touchée beaucoup d'entres nous de part ses témoignages poignats.</p>
                </section>
                <section class="item3">
                    <h2><i class="far fa-newspaper"></i>  Les derniers articles</h2>
                    <?php
                    $affichage = new Articles();
                    $affichage ->derniers();
                    ?>
                </section>
                <section class="item4">
                    <h2><i class="far fa-list-alt"></i>  Tous les articles</h2>
                    <p><a href="articles.php"> Retrouvez tout nos articles <b>Ici !</b></a> </p>
                </section>
                <section class="item5">
                    <h2><i class="far fa-envelope"></i>  NewsLetter :</h2>
                    <form action="index.php" method="post">
                        <label for="email">Vous souhaitez être <br> informer des dernières sorties ?</label><br>
                        <input name="email" type="email" placeholder="Entrez votre e-mail" required /><br>
                        <button class="btn-grad" name="news" type="submit">S'abonner</button>
                        <?php
                        if(isset($_POST['email'])){
                            echo '<p class="alert-css alert-info text-center" role="alert"><b>Merci</b> pour votre inscription.</p>';
                        }
                        ?>
                    </form>
                </section>
                <section class="item6">
                    <h2>Nous sommes ici aussi !</h2>
                    <section class="icones">
                        <a href="https://fr-fr.facebook.com/"><i class="fab fa-facebook-square"></i></a>
                        <a href="https://www.instagram.com/?hl=fr"><i class="fab fa-instagram-square"></i></a>
                        <a href="https://twitter.com/?lang=fr"><i class="fab fa-twitter-square"></i></a>
                    </section>
                </section>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require("../layout.php");?>
