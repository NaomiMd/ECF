<?php
require_once _ROOT_ . '/Modal/Menu.php';
class MenuController
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
    $menus = [];
    $req = $this->pdo->query("SELECT * FROM `menu`");
    $data = $req->fetchAll();
    foreach($data as $menu)
    {
        $menus[] = new Menu($menu);
    }
    return $menus;
}

public function getIdMenu($id): Menu
{
    $req = $this->pdo->prepare("SELECT * FROM `menu` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $menu = new Menu($data);
    return $menu;
}

public function createMenu(Menu $newMenu)
{
    $req = $this->pdo->prepare("INSERT INTO `menu` (title, description, price) VALUES (:title, :description, :price) ");
    $req->bindValue(":title", $newMenu->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":description", $newMenu->getDescription(), PDO::PARAM_STR);
    $req->bindValue(":price", $newMenu->getPrice(), PDO::PARAM_STR);
    $req->execute();
}

public function updateMenu(Menu $menu)
{
    $req = $this->pdo->prepare("UPDATE `menu` SET title=:title, description=:description, price=:price WHERE id=:id");
    $req->bindValue(":id", $menu->getId(), PDO::PARAM_INT);
    $req->bindValue(":title", $menu->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":description", $menu->getDescription(), PDO::PARAM_STR);
    $req->bindValue(":price", $menu->getPrice(), PDO::PARAM_STR);

    $req->execute();
}
public function deleteMenu($id)
{
    $req = $this->pdo->prepare("DELETE FROM `menu` WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
}
}