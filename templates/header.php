<!-- Header de Blog -->
<head>
    <meta charset=UTF-8">
    <title></title>
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
    <nav class="navbar navbar-expand-lg navbar-light">
        <section class="container-fluid">
            <!-- <a class="navbar-brand" href="#"></a> -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
            <section class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link " href="index.php"><i class="fas fa-home"></i> | Home</a></li>
                    <li class="nav-item"><a class="nav-link " href="articles.php"><i class="fas fa-stream"></i> | Articles</a></li>
                    <?php if (isset($_SESSION['id'])){echo ('<li class="nav-item"><a class="nav-link" href="creer-article.php"><i class="fas fa-plus"></i> | Ajouter</a></li>');} ?>
                    <?php if (!isset($_SESSION['id'])){echo ('<li class="nav-item"><a class="nav-link" href="inscription.php"><i class="fas fa-user-plus"></i> | Inscription</a></li><li class="nav-item"><a class="nav-link" href="connexion.php"><i class="fas fa-door-open"></i> | Connexion</a></li>');} ?>
                    <?php if (isset($_SESSION['id'])){echo ('<li class="nav-item"><a class="nav-link" href="profil.php"><i class="fas fa-user-circle"></i> | Profil</a></li>');} ?>
                    <?php if (isset($_SESSION['id'])){if ($_SESSION['id_droits'] == 1337 || $_SESSION['id_droits'] == 42){echo ('<li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-user-lock"></i> | Admins</a></li>');}} ?>
                    <?= $btnLogout ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['id'])){ echo '<li><form method="POST" action="index.php"><button type="submit" class="btn btn-dark" name="logout" title="Déconnexion"><i class="fas fa-power-off"></i></button></form></li>';}?>
                </ul>
            </section>
        </section>
    </nav>
</header>