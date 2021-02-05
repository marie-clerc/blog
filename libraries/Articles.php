<?php

require_once('Model.php');


class Articles extends Model{

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

    /*public function pagesArticles(){

        $sql = "SELECT * FROM `articles` WHERE `date` ORDER BY date DESC";

        $query = $this->pdo-> prepare($sql);
        $query->execute();

        $article = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($article as $articles){

            $_GET['id'] = @$articles['id'];

            echo '<h2>' .$articles['titre']. '</h2><p>' . $articles['article'] . '</p><a href="article.php?id='.$_GET['id'].'"> Lire l\'article en entier !</a><p> Posté le : ' .$articles['date'] .'</p><hr>';
        }
    }*/

    public function pagesArticles(){

        $sql = "SELECT * FROM `articles` WHERE `date` ORDER BY date DESC";

        $query = $this->pdo-> prepare($sql);
        $query->execute();

        $article = $query->fetch(PDO::FETCH_ASSOC);

        while($article){

            $_GET['id'] = @$articles['id'];

            echo '<h2>' .$articles['titre']. '</h2><p>' . $articles['article'] . '</p><a href="article.php?id='.$_GET['id'].'"> Lire l\'article en entier !</a><p> Posté le : ' .$articles['date'] .'</p><hr>';

        }
    }
}

?>