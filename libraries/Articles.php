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

        $sql ="SELECT COUNT(id) as nbArt FROM articles";

        $query = $this->pdo-> prepare($sql);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        $nbArt = $data['nbArt'];
        $perPage = 2;
        $cPage =1;
        $nbPage = ceil($nbArt/$perPage);

        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<= $nbPage){

            $cPage = $_GET['p'];
        }
        else{
            $cPage =1;
        }

        $sql = "SELECT * FROM `articles` WHERE `date` ORDER BY date DESC LIMIT ".(($cPage-1)*$perPage).",$perPage";

        $query = $this->pdo-> prepare($sql);
        $query->execute();

        $article = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($article as $articles){

            $_GET['id'] = @$articles['id'];

            echo '<h2>' .$articles['titre']. '</h2><p>' . $articles['article'] . '</p><a href="article.php?id='.$_GET['id'].'"> Lire l\'article en entier !</a><p> Posté le : ' .$articles['date'] .'</p><hr>';
        }

        for($i=1; $i<=$nbPage; $i++){
            if($i==$cPage){
                echo " $i  / ";
            }
            else{
                echo " <a href=\"articles.php?p=$i\"> $i  </a>/ ";
            }


        }

    }
}

?>