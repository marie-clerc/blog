<?php


class Admin extends Model
{
    public function getAllArticles()
    {
        $query = $this -> pdo -> prepare("SELECT titre FROM articles");
        $query -> execute();

        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}