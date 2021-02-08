<?php


class Admin extends Model
{
    /**
     * Permet d'afficher tout les articles dans un tableau
     *
     * @return array
     */
    public function getAllArticles()
    {
        $query = $this -> pdo -> prepare("SELECT * FROM articles");
        $query -> execute();

        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Permet d'afficher un formulaire de modification et de modifier le titre & article d'un Article selectionné
     *
     * @param $id
     */
    public function displayUpdateArticle($id)
    {
        echo ('<form action="" method="post" style="margin-top: 5%">
                   <input type="text" id="update_title" name="updateTitle" placeholder="Modifier le titre" required>
                   <input type="text" id="update_article" name="updateArticle" placeholder="Modifier l\'article" required>
                   <input type="submit" class="btn btn-warning" id="valid_update" name="validUpdate" value="Valider">
               </form>');

        if (isset($_POST['validUpdate']))
        {
            $updateTitle = htmlspecialchars(trim($_POST['updateTitle']));
            $updateArticle = htmlspecialchars(trim($_POST['updateArticle']));

            $query = $this -> pdo -> prepare("UPDATE articles SET titre = :titre, article = :article WHERE id = :id");
            $query -> execute([
                "titre" => $updateTitle,
                "article" => $updateArticle,
                "id" => $id
            ]);

            Http::redirect("../pages/admin.php");
        }
    }
}