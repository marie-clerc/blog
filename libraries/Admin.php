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
        $query = $this -> pdo -> prepare("SELECT titre FROM articles");
        $query -> execute();

        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
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

                $query = $this -> pdo -> prepare("SELECT id FROM articles");
                $query -> execute();

                $result = $query -> fetchAll(PDO::FETCH_ASSOC);

                if ($query -> rowCount())
                {
                    $_SESSION['id_article'] = $result['id'];
                }

                $stmt = $this -> pdo -> prepare("UPDATE articles SET titre = :titre, article = :article WHERE id = :id");
                $stmt -> execute([
                    "titre" => $newTitle,
                    "article" => $newArticle,
                    "id" => $_SESSION['id_article']
                ]);
            }
        }
    }
}