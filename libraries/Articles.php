<?php

require_once('Model.php');

class Articles extends Model{

    //Fonctions pour la page d'accueil.

    /**
     * Permet d'afficher les 3 derniers articles sur la page d'accueil.
     * @return mixed
     */

    public function derniers(){

        $req = "SELECT id, titre, article, date FROM `articles` WHERE `date` ORDER BY date DESC LIMIT 3";

        $art = $this->pdo-> prepare("$req");
        $art -> execute();

        while ($count = $art->fetch(PDO::FETCH_ASSOC)){

            $_GET['id'] = @$count['id'];

            echo '<p><b>' . ucfirst(substr($count['titre'],0,30)) . '   <a href="article.php?id='.$_GET['id'].'"><u>Voir plus !</u></b></a> <br> posté le ' . $count['date'] .  '</p>';

        }
        return $count;
    }

    //Fonctions pour la page Articles.

    public function getAllCategories(){

        /**
         * Permet de trier par catégories pour ensuite choisir au niveau de la select box de la page Articles.
         * @return mixed
         */

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

    public function pagesArticles(){

        /**
         * Permet d'afficher TOUS les articles ainsi que la pagination en dessous.
         * @return mixed
         */

        $sql1 ="SELECT COUNT(id) as nbArt FROM articles";

        $query = $this->pdo-> prepare($sql1);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        $nbArt = $data['nbArt'];
        $perPage = 5;
        $cPage =1;
        $nbPage = ceil($nbArt/$perPage);

        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<= $nbPage){

            $cPage = $_GET['p'];
        }
        else{
            $cPage =1;
        }

        $sql2 = "SELECT * FROM `articles` WHERE `date` ORDER BY date DESC LIMIT ".(($cPage-1)*$perPage).",$perPage";

        $query = $this->pdo-> prepare($sql2);
        $query->execute();

        $article = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($article as $articles) {

            $_GET['id'] = @$articles['id'];

            echo '<h2>' . ucfirst($articles['titre']) . '</h2>
                  <p>' . substr($articles['article'], 0, 150) . '...</p>
                  <a href="article.php?id=' . $_GET['id'] . '"><i class="fas fa-arrow-right"></i> Lire l\'article en entier !</a>
                  <p><u> Posté le : ' . $articles['date'] . '</u></p><hr><br>';
        }

        for($i=1; $i<=$nbPage; $i++){

            if($i==$cPage){
                echo "<a class='nPagesA'>$i</a>";
            }
            else{
                echo " <a class='nPages' href=\"articles.php?p=$i\">$i</a>  ";
            }
        }
    }

    public function getChoix($nom,$id){

        /**
         * Permet d'afficher uniquement les articles dont la catégorie qui a été choisie.
         * @return mixed
         */

        $sql2 = "SELECT * FROM articles AS a INNER JOIN categories AS c ON c.nom=:nom WHERE c.id=a.id_categorie ORDER BY date DESC";

        $result = $this->pdo-> prepare($sql2);
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

    /**
     * CODE MARIE
     */
    /**
     * @param $id
     * @return false|PDOStatement
     * Montre l'article cliqué
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

    /**
     * @param $id
     * @return false|PDOStatement
     * montre les commentaires de l'article cliqué
     */
    public function showcomments($id)
    {
        $id_article = $id;
        $sql = 'SELECT commentaire, commentaires.date, utilisateurs.login
                FROM articles
                INNER JOIN commentaires ON commentaires.id_article = articles.id
                INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur
                WHERE articles.id = :idarticle
                ORDER BY date ASC';
        $stm = $this->pdo->prepare($sql);
        $stm->execute(['idarticle'=>$id_article]);
        //var_dump($stm);
        return ($stm);
    }

    /**
     * @param $id
     * permet d'inscrire un nouveau commentaire en bdd
     */
    public function writecomments ($id) {
        if (isset($_POST["submit"])) {
            if (empty($_POST['comment'])) {
                echo '<div class="alert alert-warning" role="alert">Ecrivez un commmentaire</div>';
            }
            else {
                $comment = $_POST['comment'];
                $id_article = $id;
                $id_utilisateur = $_SESSION['id'];
                $sql = 'INSERT INTO `commentaires`(`commentaire`, `id_article`, `id_utilisateur`, `date`) 
                    VALUES (:commentaire, :article, :utilisateur, CURRENT_TIMESTAMP)';
                $stm = $this->pdo->prepare($sql);
                $stm->execute(['commentaire'=> $comment, 'article'=> $id_article, 'utilisateur'=> $id_utilisateur]);
            }
        }
    }


}

?>