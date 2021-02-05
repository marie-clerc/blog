<?php

require_once('Model.php');


class Articles extends Model{

    /**
     * CODE GUILLAUME
     */

    /**
     * Permet d'afficher les 3 derniers articles sur la page d'accueil.
     * @return mixed
     */
    public function derniers(){

        $req = "SELECT id, article, date FROM `articles` WHERE `date` ORDER BY date DESC LIMIT 3";

        $art = $this->pdo-> prepare("$req");
        $art -> execute();

        while ($count = $art->fetch(PDO::FETCH_ASSOC)){

                $_GET['id'] = @$count['id'];

                echo '<p><a href="article.php?id='.$_GET['id'].'">' . ucfirst($count['article']) . ' posté le ' . $count['date'] .  '</a></p>';

        }
        return $count;
    }

    public function pages(){

        $sql = "SELECT * FROM `articles` WHERE `date` ORDER BY date DESC";

        $query = $this->pdo-> prepare($sql);
        $query->execute();

        $article = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($article as $articles){

            $_GET['id'] = @$articles['id'];

            echo '<h2>' .$articles['titre']. '</h2><p>' . $articles['article'] . '</p><a href="article.php?id='.$_GET['id'].'"> Lire l\'article en entier !</a><p> Posté le : ' .$articles['date'] .'</p><hr>';
        }

    }


    /**
     * CODE MARIE
     */

    public function showarticle($id) {
        $id_article = $id; // on va utiliser le get de la fonction pages ou dernier
        $sql = 'SELECT titre, article, articles.date, utilisateurs.login
                FROM articles
                INNER JOIN utilisateurs ON utilisateurs.id = articles.id_utilisateur
                WHERE articles.id = :idarticle';
        $stm = $this->pdo->prepare($sql);
        $stm->execute(['idarticle'=>$id_article]);
        //var_dump($sql);
        return ($stm);

    }


    public function showcomments($id)
    {
        $id_article = $id;
        $sql = 'SELECT commentaire, commentaires.date, utilisateurs.login
                FROM articles
                INNER JOIN commentaires ON commentaires.id_article = articles.id
                INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur
                WHERE articles.id = :idarticle';
        $stm = $this->pdo->prepare($sql);
        $stm->execute(['idarticle'=>$id_article]);
        //var_dump($stm);
        return ($stm);

    }

    public function writecomments () {
        if (isset($_POST["submit"])) {
            if (empty($_POST['comment'])) {
                echo 'ecrivez un commentaire';
            }
            else {
                $comment = $_POST['comment'];
                $id_article = $_SESSION['id_article'];
                $id_utilisateur = 1;
                $sql = 'INSERT INTO `commentaires`(`commentaire`, `id_article`, `id_utilisateur`, `date`) 
                    VALUES commentaire = :commentaire, id_article = :article, id_utilisateur= :utilisateur, CURRENT_TIMESTAMP';
                $stm = $this->pdo->prepare($sql);
                $stm->execute(['commentaire'=> $comment, 'article'=> $id_article, 'utilisateur'=> $id_utilisateur]);
            }
        }
    }


}

?>