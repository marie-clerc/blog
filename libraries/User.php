<?php


class User extends Model
{
    /**
     * Permet de chercher dans la base de données si un login est déjà utilisé
     *
     * @param $login
     * @return mixed
     */
    public function find($login)
    {
        $query = $this -> pdo -> prepare("SELECT login FROM utilisateurs WHERE login = :login");
        $query -> execute([
            "login" => $login
        ]);

        $result = $query -> fetch();
        return $result;
    }

    /**
     * Permet d'enregister un nouvel utilisateur
     */
    public function register()
    {

        if (isset($_POST['register']))
        {
            if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['confirmPassword']) || empty($_POST['email']))
            {
                echo ('Veuillez remplir le formulaire d\'inscription.');
            }
            else
            {
                $login = htmlspecialchars(trim($_POST['login']));
                $password = htmlspecialchars(trim($_POST['password']));
                $confirmPassword = htmlspecialchars(trim($_POST['confirmPassword']));
                $email = htmlspecialchars(trim($_POST['email']));

                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $loginExist = $this -> find($login);

                if ($loginExist)
                {
                    echo("Ce nom d'utilisateur existe déjà.");
                }
                else
                {
                    if ($password === $confirmPassword)
                    {
                        $query = $this -> pdo -> prepare("INSERT INTO utilisateurs(login, password, email, id_droits) VALUES(:login, :password, :email, 1)");
                        $query -> execute([
                            "login" => $login,
                            "password" => $hashedPassword,
                            "email" => $email
                        ]);
                        Http::redirect('../../templates/pages/connexion.php');
                    }
                    else
                    {
                        echo ("Login/mot de passe incorrect.");
                    }
                }
            }
        }
    }

    /**
     * Permet à un utilisateur existant de se connecter
     */
    public function connect()
    {
        if (isset($_POST['connect']))
        {
            if (empty($_POST['login']) || empty($_POST['password']))
            {
                echo('Veuillez remplir le formulaire de connexion.');
            }
            else
            {
                $user = htmlspecialchars(trim($_POST['login']));
                $userPassword = htmlspecialchars(trim($_POST['password']));

                $getPassword = $this -> pdo -> prepare("SELECT password FROM utilisateurs WHERE login = :login");
                $getPassword -> execute([
                    "login" => $user
                ]);

                $result = $getPassword -> fetch();

                if (!$result)
                {
                    echo ("utilisateur introuvable.");
                }
                else
                {
                    $checkPassword = $result['password'];

                    if (password_verify($userPassword, $checkPassword))
                    {
                        $data = $this -> pdo -> prepare("SELECT * FROM utilisateurs WHERE login = :login AND password = :password");
                        $data -> execute([
                            "login" => $user,
                            "password" => $checkPassword
                        ]);

                        $infoUser = $data -> fetch(PDO::FETCH_ASSOC);

                        if ($data -> rowCount())
                        {
                            $_SESSION['id'] = $infoUser['id'];
                            $_SESSION['login'] = $infoUser['login'];
                            $_SESSION['password'] = $infoUser['password'];
                            $_SESSION['email'] = $infoUser['email'];
                            $_SESSION['id_droits'] = $infoUser['id_droits'];
                        }
                        Http::redirect('../../templates/pages/index.php');
                    }
                    else
                    {
                        echo ("utilisateur introuvable.");
                    }
                }
            }
        }
    }

    /**
     * Permet à un utilisateur existant d'accéder à ses informations personnelle et de les modifiers
     */
    public function update()
    {
        if (isset($_SESSION['id']))
        {
            if (isset($_POST['update']))
            {
                if (empty($_POST['newLogin']) || empty($_POST['newPassword']) || empty($_POST['newConfirmPassword']) || empty($_POST['newEmail']))
                {
                    echo('Veuillez remplir le formulaire de modification de profil.');
                }
                else
                {
                    $newLogin = htmlspecialchars(trim($_POST['newLogin']));
                    $unhashedPassword = htmlspecialchars(trim($_POST['newPassword']));
                    $newConfirmPassword = htmlspecialchars(trim($_POST['newConfirmPassword']));
                    $newEmail = htmlspecialchars(trim($_POST['newEmail']));

                    $updateHashedPassword = password_hash($unhashedPassword, PASSWORD_BCRYPT);

                    if ($unhashedPassword === $newConfirmPassword)
                    {
                        $loginExist = $this -> find($newLogin);

                        if ($loginExist)
                        {
                            echo ("Erreur : Nom d'utilisateur déjà existant.");
                        }
                        else
                        {
                            $updateUser = $this -> pdo -> prepare("UPDATE utilisateurs SET login = :newLogin, password = :newPassword, email = :email WHERE id = :id");
                            $updateUser -> execute([
                                "newLogin" => $newLogin,
                                "newPassword" => $updateHashedPassword,
                                "email" => $newEmail,
                                "id" => $_SESSION['id']
                            ]);

                            $_SESSION['login'] = $newLogin;
                            $_SESSION['password'] = $updateHashedPassword;
                            $_SESSION['email'] = $newEmail;

                            session_destroy();
                            Http::redirect('../../templates/pages/connexion.php');
                        }
                    }
                    else
                    {
                        echo ("Erreur : Authentification des mot de passes incorrect.");
                    }
                }
            }
            else
            {
                echo ("Erreur : Login/mot de passe incorrect.");
            }
        }
    }
}