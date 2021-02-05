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

    // Test tri cat
    public function getAllCategories(){

        $sql = "SELECT * FROM categories";

        $result = $this->pdo-> prepare($sql);
        $result->execute();

        $i=0;

        while ($fetch = $result->fetch(PDO::FETCH_ASSOC)){

            $tab[$i][]=$fetch['id'];
            $tab[$i][]=$fetch['nom'];
            $i++;
        }
        return $tab;
    }

    public function getChoix($nom){

        $sql = "SELECT * FROM articles AS a INNER JOIN categories AS c ON c.nom=:nom WHERE c.id=a.id_categorie ORDER BY date";

        $result = $this->pdo-> prepare($sql);
        $result->bindValue(':nom', $nom);
        $result->execute();

        $i =0;

        while ($fetch = $result->fetch(PDO::FETCH_ASSOC)){

            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['titre'];
            $tableau[$i][] = $fetch['article'];
            $tableau[$i][] = $fetch['id_utilisateur'];
            $tableau[$i][] = $fetch['id_categorie'];
            $tableau[$i][] = $fetch['date'];

            $i++;
        }
        return $tableau;
    }

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

        foreach($article as $articles) {

            $_GET['id'] = @$articles['id'];

            echo '<h2>' . $articles['titre'] . '</h2><p>' . $articles['article'] . '</p><a href="article.php?id=' . $_GET['id'] . '"> Lire l\'article en entier !</a><p> Posté le : ' . $articles['date'] . '</p><hr>';

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