<?php


class Admin extends Model
{
    /**
     * GESTION ARTILCES -> Permet d'afficher tout les articles
     *
     * @return array
     */
    public function getAllArticles(): array
    {
        $query = $this -> pdo -> prepare("SELECT * FROM articles");
        $query -> execute();

        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * GESTION ARTILCES -> Permet d'afficher les valeurs d'articles selectionnés dans les champs du formulaire de modification
     *
     * @param $id
     * @return array
     */
    public function replaceValueArticle($id): array
    {
        $query = $this -> pdo -> prepare("SELECT titre, article FROM articles WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);

        $result = $query -> fetch(PDO::FETCH_ASSOC);

        $_SESSION['titre'] = $result['titre'];
        $_SESSION['article'] = $result['article'];

        return $_SESSION;
    }

    /**
     * GESTION ARTILCES -> Permet d'afficher le formulaire de modification d'articles
     *
     * @param $id
     */
    public function displayUpdateArticle($id)
    {
        $this -> replaceValueArticle($id);
        echo ('<form action="" method="post" style="margin-top: 5%">
                   <section class="container"><input type="text" id="update_title" name="updateTitle" value="' . $_SESSION['titre'] . '"></section>
                   <section class="container"><textarea type="text" id="update_article" name="updateArticle">' . $_SESSION['article'] . '...</textarea></section>
                   <section class="container"><input type="submit" class="btn btn-warning" id="valid_update" name="validUpdate" value="Valider"></section>
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

    /**
     * GESTION DES ARTICLES -> Supprime un article
     *
     * @param $id
     */
    public function deleteArticle($id)
    {
        $query = $this -> pdo -> prepare("DELETE FROM articles WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);

        Http::redirect("../pages/admin.php");
    }

    /**
     * GESTION CATEGORIES -> Permet d'afficher toutes catégories dans un tableau
     *
     * @return array
     */
    public function getAllCategories(): array
    {
        $query = $this -> pdo -> prepare("SELECT * FROM categories");
        $query -> execute();

        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * GESTION CATEGORIES -> Permet de placer les données selectionnées de 'catégories' dans les values="" des input
     *
     * @param $id
     * @return array
     */
    public function replaceValueCategory($id): array
    {
        $query = $this -> pdo -> prepare("SELECT nom FROM categories WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $_SESSION['nom'] = $result['nom'];

        return $_SESSION;
    }

    /**
     * GESTION CATEGORIES -> Permet d'afficher un formulaire de modification et de modifier le nom d'une Catégorie selectionné
     *
     * @param $id
     */
    public function displayUpdateCategory($id)
    {
        $this -> replaceValueCategory($id);
        echo ('<form action="" method="post" style="margin-top: 5%">
                   <section class="container"><input type="text" id="update_Category" name="updateCategory" value="' . $_SESSION['nom'] . '"></section>
                   <section class="container"><input type="submit" class="btn btn-warning" id="valid_update" name="validUpdate" value="Valider"></section>
               </form>');

        if (isset($_POST['validUpdate']))
        {
            $updateName = htmlspecialchars(trim($_POST['updateCategory']));

            $query = $this -> pdo -> prepare("UPDATE categories SET nom = :nom WHERE id = :id");
            $query -> execute([
                "nom" => $updateName,
                "id" => $id
            ]);

            Http::redirect("../pages/admin.php");
        }
    }

    /**
     * GESTION CATEGORIES -> Supprime une catégorie
     *
     * @param $id
     */
    public function deleteCategory($id)
    {
        $query = $this -> pdo -> prepare("DELETE FROM categories WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);

        Http::redirect("../pages/admin.php");
    }

    /**
     * GESTION COMMENTAIRES -> Permet d'afficher tous les commentaires dans un tableau
     *
     * @return array
     */
    public function getAllComments(): array
    {
        $query = $this -> pdo -> prepare("SELECT * FROM commentaires");
        $query -> execute();

        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * GESTION COMMENTAIRES -> Permet de supprimer un commentaire
     *
     * @param $id
     */
    public function deleteComment($id)
    {
        $query = $this -> pdo -> prepare("DELETE FROM commentaires WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);

        Http::redirect("../pages/admin.php");
    }

    /**
     * GESTION UTILISATEURS -> Affiche tout les utilisateurs
     *
     * @return array
     */
    public function getAllUsers(): array
    {
        $query = $this -> pdo -> prepare("SELECT * FROM utilisateurs");
        $query -> execute();

        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * GESTION UTILISATEURS -> Permet de placer les données selectionnées de 'utilisateurs' dans les values="" des input
     *
     * @param $id
     * @return array
     */
    public function replaceValueUsers($id): array
    {
        $query = $this -> pdo -> prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);

        $result = $query -> fetch(PDO::FETCH_ASSOC);

        $_SESSION['loginAdmin'] = $result['login'];
        $_SESSION['passwordAdmin'] = $result['password'];
        $_SESSION['emailAdmin'] = $result['email'];
        $_SESSION['droitsAdmin'] = $result['id_droits'];

        return $result;
    }

    /**
     * GESTION UTILISATEURS -> Permet d'afficher un formulaire de modification et de modifier un compte utilisateur selectionné
     *
     * @param $id
     */
    public function displayUpdateusers($id)
    {
        $this -> replaceValueUsers($id);
        echo ('<form action="" method="post" style="margin-top: 5%">
                   <section class="container"><input type="text" id="update_LoginAdmin" name="updateLogin" value="' . $_SESSION['loginAdmin'] . '"></section>
                   <section class="container"><input type="text" id="update_EmailAdmin" name="updateMail" value="' . $_SESSION['emailAdmin'] . '"></section>
                   <section class="container"><label for="update_DroitsAdmin">(1337 = Administrateur | 42 = Modérateur | 1 = Membre)</label><br /><input type="text" id="update_DroitsAdmin" name="updateDroits" value="' . $_SESSION['droitsAdmin'] . '"></section>
                   <section class="container"><input type="submit" class="btn btn-warning" id="valid_update" name="validUpdate" value="Valider"></section>
               </form>');

        if (isset($_POST['validUpdate']))
        {
            $updateLogin = htmlspecialchars(trim($_POST['updateLogin']));
            $updateEmail = htmlspecialchars(trim($_POST['updateMail']));
            $updateDroits = htmlspecialchars(trim($_POST['updateDroits']));

            if ($updateDroits == 1337 || $updateDroits == 42 || $updateDroits == 1)
            {
                $query = $this -> pdo -> prepare("UPDATE utilisateurs SET login = :login, email = :email, id_droits = :droit WHERE id = :id");
                $query -> execute([
                    "login" => $updateLogin,
                    "email" => $updateEmail,
                    "droit" => $updateDroits,
                    "id" => $id
                ]);

                $_SESSION['loginAdmin'] = $updateLogin;
                $_SESSION['emailAdmin'] = $updateEmail;
                $_SESSION['droitsAdmin'] = $updateDroits;

                Http::redirect("../pages/admin.php");
            }
            else
            {
                echo ('Erreur: le droit n\'existe pas');
            }
        }
    }

    /**
     * GESTION UTILISATEURS -> Supprime un utilisateur
     *
     * @param $id
     */
    public function deleteUser($id)
    {
        $query = $this -> pdo -> prepare("DELETE FROM utilisateurs WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);

        Http::redirect("../pages/admin.php");
    }
}