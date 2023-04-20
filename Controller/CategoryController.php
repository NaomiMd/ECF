<?php

require_once _ROOT_ . '/Modal/Category.php';

/**
 * Summary of SpecialiteController
 */
class CategoryController
{
    private $pdo;

    public function __construct()
    {

        try
        {
            $this->pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', 'root');
        }catch (Exception $e){
        echo('Erreur : ' . $e->getMessage());
        }
    }

    public function getPdo ()
{
    return $this->pdo;
}

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }
    
    public function getAll(): array
    {
        $categories= []; 
        $req= $this->pdo->query("SELECT * FROM `category`");
        $data = $req->fetchAll();
        foreach ($data as $category){
            $categories[] = new Category($category);
        }
        return $categories;
    }
    
    public function getCategoryById($id): Category
    {
        $req = $this->pdo->prepare("SELECT * FROM `category` WHERE id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $category = new Category($data);
        return $category;
    }

    public function createCategory(Category $newCategory)
{
    $req = $this->pdo->prepare("INSERT INTO `category` (title) VALUES (:title) ");
    $req->bindValue(":title", $newCategory->getTitle(), PDO::PARAM_STR);

    $req->execute();
}

public function updateSpecialite(Category $category)
{
    $req = $this->pdo->prepare("UPDATE `category` SET title = :title WHERE id = :id  ");
    $req->bindValue(":title", $category->getTitle(), PDO::PARAM_STR);

    $req->bindValue(":id", $category->getId(), PDO::PARAM_INT);
    $req->execute();
}

public function deleteCategory(int $id)
{
    $req = $this->pdo->prepare("DELETE FROM `category` WHERE id= :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
}
}