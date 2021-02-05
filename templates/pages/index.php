<?php
require_once('../../libraries/autoload.php');
session_start();
?>
<?php require ('../../libraries/Articles.php') ?>
<?php 
if (isset($_POST['logout'])){
    session_destroy();
    Http::redirect('connexion.php');
    exit(); }
?>
<?php $css = ""; ?>
<?php if (isset($_SESSION['id'])){$btnLogout = '<form method="POST" action="index.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';}else{$btnLogout = NULL;} ?>
<?php $css = "css/index.css"; ?>
<?php ob_start(); ?>
<main>
    <article>
        <!-- Code Guillaume -->
        <section class="container-fluid">
            <section class="main-cont">
                <section class="item1">
                    <h1>La détresse des jeunes face au covid, parlons en.</h1>
                </section>
                <section class="item2">
                    <h2>Nouveautés</h2>
                    <iframe src="https://www.youtube.com/embed/9XzBeUUATbE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p>Les témoignages poignants recueillis par le vidéaste HugoDécrypte</p>
                </section>
                <section class="item3-title">
                    <h2> Les derniers articles :</h2>
                </section>
                <section class="item3-1">
                    <?php
                    $affichage = new Articles();
                    $affichage ->derniers();
                    ?>
                </section>
                <section class="item4">
                    <h2>Tout les articles</h2>
                    <p><a href="articles.php"> Retrouvez tout nos articles <b>Ici !</b></a> </p>
                </section>
                <section class="item5">
                    <h2>NewsLetter :</h2>
                    <form action="" method="post">
                        <label for="email">Vous souhaitez être <br> informer des dernières sorties ?</label><br>
                        <input name="email" type="email" value="Entrez votre e-mail" /><br><br>
                        <button type="submit">S'abonner</button>
                    </form>
                </section>
                <section class="item6">
                    <h2>Nos réseaux:</h2>
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
<?php require("../layout.php");?>
