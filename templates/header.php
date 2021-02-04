<?php
require_once ('../../libraries/autoload.php');

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connection.php');
    exit();
}
?>

<!-- Header de Blog -->
<head>
    <meta charset=UTF-8">
    <title>Actu Covid</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href= <?= $css ?> >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- ICO -->
    <link rel="icon" href="">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <section class="container-fluid">
            <a class="navbar-brand" href="index.php">Actu Covid</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
            <section class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Articles</a></li>
                    <?php if (isset($_SESSION['id'])){echo ('<li class="nav-item"><a class="nav-link" href="creer-article.php">Ajouter</a></li>');} ?>
                    <?php if (!isset($_SESSION['id'])){echo ('<li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li><li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>');} ?>
                    <?php if (isset($_SESSION['id'])){echo ('<li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>');} ?>
                    <?php if (isset($_SESSION['id'])){if ($_SESSION['id_droits'] == 1337 || $_SESSION['id_droits'] == 42){echo ('<li class="nav-item"><a class="nav-link" href="admin.php">Admins</a></li>');}} ?>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?= $btnLogout ?>
                </ul>
            </section>
        </section>
    </nav>
</header>