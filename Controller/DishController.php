<?php
require_once _ROOT_ . '/Modal/Dish.php';
class DishController
{
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', 'root');
        }catch(Exception $e){
            echo('Erreur : ' .$e->getMessage());
        }
    }

public function getPdo()
{
    return $this->pdo;
}
public function setPdo(PDO $pdo)
{
    $this->pdo = $pdo;
    return $this;
}

public function getAll() : array
{
    $dishs = [];
    $req = $this->pdo->query("SELECT * FROM `dish`");
    $data = $req->fetchAll();
    foreach($data as $dish)
    {
        $dishs[] = new Dish($dish);
    }
    return $dishs;
}

public function getIdDish($id): Dish
{
    $req = $this->pdo->prepare("SELECT * FROM `dish` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $dish = new Dish($data);
    return $dish;
}

public function createDish(Dish $newDish)
{
    $req = $this->pdo->prepare("INSERT INTO `dish` (title, description, price, category_id) VALUES (:title, :description, :price, :category_id) ");
    $req->bindValue(":title", $newDish->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":description", $newDish->getDescription(), PDO::PARAM_STR);
    $req->bindValue(":price", $newDish->getPrice(), PDO::PARAM_STR);
    $req->bindValue(":category_id", $newDish->getCategory_Id(), PDO::PARAM_INT);
    $req->execute();
}

public function updateDish(Dish $dish)
{
    $req = $this->pdo->prepare("UPDATE `dish` SET title=:title, description=:description, price=:price, category_id=:category_id WHERE id=:id");
    $req->bindValue(":id", $dish->getId(), PDO::PARAM_INT);
    $req->bindValue(":title", $dish->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":description", $dish->getDescription(), PDO::PARAM_STR);
    $req->bindValue(":price", $dish->getPrice(), PDO::PARAM_STR);
    $req->bindValue(":category_id", $dish->getCategory_Id(), PDO::PARAM_INT);

    $req->execute();
}
public function deleteDish($id)
{
    $req = $this->pdo->prepare("DELETE FROM `dish` WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
}
}