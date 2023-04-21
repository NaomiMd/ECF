<?php
require_once _ROOT_ . '/Modal/Formule.php';
class FormuleController
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
    $formules = [];
    $req = $this->pdo->query("SELECT * FROM `formule`");
    $data = $req->fetchAll();
    foreach($data as $formule)
    {
        $formules[] = new Formule($formule);
    }
    return $formules;
}

public function getIdFormule($id): Formule
{
    $req = $this->pdo->prepare("SELECT * FROM `formule` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $formule = new Formule($data);
    return $formule;
}

public function createFormule(Formule $newFormule)
{
    $req = $this->pdo->prepare("INSERT INTO `formule` (description, price, menu_id) VALUES (:description, :price, :menu_id) ");
    $req->bindValue(":description", $newFormule->getDescription(), PDO::PARAM_STR);
    $req->bindValue(":price", $newFormule->getPrice(), PDO::PARAM_STR);
    $req->bindValue(":menu_id", $newFormule->getMenu_id(), PDO::PARAM_INT);
    $req->execute();
}

public function updateFormule(Formule $formule)
{
    $req = $this->pdo->prepare("UPDATE `formule` SET description=:description, price=:price, menu_id=:menu_id WHERE id=:id");
    $req->bindValue(":id", $formule->getId(), PDO::PARAM_INT);
    $req->bindValue(":description", $formule->getDescription(), PDO::PARAM_STR);
    $req->bindValue(":price", $formule->getPrice(), PDO::PARAM_STR);
    $req->bindValue(":menu_id", $formule->getMenu_id(), PDO::PARAM_INT);

    $req->execute();
}
public function deleteFormule($id)
{
    $req = $this->pdo->prepare("DELETE FROM `formule` WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
}
}