<?php


class article extends Model
{
    /**
     * trouver les categories disponibles pour les proposer dans la création
     * d'un article.
     * @return array
     */
    public function findcategories() {
        $sql = "SELECT nom ,id FROM categories ORDER BY id";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        $i=0;
        while($fetch = $stm->fetch(PDO::FETCH_ASSOC)){
            $tab[$i][] = $fetch['id'];
            $tab[$i][] = $fetch['nom'];
        $i++;
        }
        return $tab;
    }


    /**
     * crée un article et répartie dans la bonne catégorie
     */
    public function createarticle() {
        if (isset($_POST["submit"])) {
            if ((empty($_POST["title"])) || (empty($_POST["article"])) || (empty($_POST["categories"]))) {
                echo "veillez remplir tous les champs et selectionner une catégorie";
            }
            else {
                $title = $_POST["title"];
                $article = $_POST["article"];
                $id_utilisateur = 1;
                $nom_categorie = $_POST['categories'];

                //trouver comment connecter le nom_categorie avec id_categorie
                $sql= 'SELECT `id` FROM `categories` WHERE `nom`= :nom';
                $stm = $this->pdo->prepare($sql);
                $stm->execute(['nom' => $nom_categorie]);
                $result = $stm->fetchAll();
                $id_categorie = $result[0]['id'];

                $sql2 = "INSERT INTO `articles`(`titre`, `article`, `id_utilisateur`, `id_categorie`, `date`)
                        VALUES(:titre, :article, :id_utilisateur, :id_categorie, CURRENT_TIMESTAMP)";
                $stm2 = $this->pdo->prepare($sql2);
                $stm2->execute([
                    'titre' => $title,
                    'article' => $article,
                    'id_utilisateur' => $id_utilisateur,
                    'id_categorie' => $id_categorie
                ]);
            }
        }
    }


    public function showarticle() {


    }

    public function showcomments()
    {
        $id_article = 2;
        $sql = 'SELECT commentaire, commentaires.date, utilisateurs.login
                FROM articles
                INNER JOIN commentaires ON commentaires.id_article = articles.id
                INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur
                WHERE articles.id = :idarticle';
        $stm = $this->pdo->prepare($sql);
        $stm->execute(['idarticle'=>$id_article]);

        return ($stm);

    }
    public function writecomments () {
        if (isset($_POST["submit"])) {
            if (empty($_POST['comment'])) {
                echo 'ecrivez un commentaire';
            }
            else {
                $comment = $_POST['comment'];
                $sql = ''

            }
        }

    }
}