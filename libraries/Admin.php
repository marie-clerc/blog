<?php


class Admin extends Model
{
    /**
     * Permet d'afficher le titre de tout les articles présent dans la table en base de données
     *
     * @return array
     */
    public function showArticles()
    {
        $query = $this -> pdo -> prepare("SELECT * FROM articles");
        $query -> execute();

        $i = 0;

        while ($result = $query -> fetch(PDO::FETCH_ASSOC))
        {
            $tab[$i][] = $result['id'];
            $tab[$i][] = $result['titre'];
            $i++;
            // var_dump($tab);
        }
        return $tab;
    }

    public function modifyArticles()
    {
        if (isset($_POST['validNewArticle']))
        {
            if (empty($_POST['newTitle']) || empty($_POST['newArticle']))
            {
                echo ('Veuillez remplir le formulaire de modification d\'articles');
            }
            else
            {
                $newTitle = htmlspecialchars(trim($_POST['newTitle']));
                $newArticle = htmlspecialchars(trim($_POST['newArticle']));

                $stmt = $this -> pdo -> prepare("UPDATE articles SET titre = :titre, article = :article WHERE id = :id");
                $stmt -> execute([
                    "titre" => $newTitle,
                    "article" => $newArticle,
                    "id" => $_SESSION['id_article']
                ]);

                echo ('Modification de l\'article réussi');
            }
        }
    }
}