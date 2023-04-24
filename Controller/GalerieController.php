<?php

require_once _ROOT_ . '/Modal/Galerie.php';


class GalerieController 
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

public function getFrontImage($image)
{
    if(!$image === null){
        return CSS_PATH .$image;
    }
}
public function getAll() : array
{
    $galeries = [];
    $req = $this->pdo->query("SELECT * FROM `galery`");
    $data = $req->fetchAll();
    foreach($data as $galerie)
    {
        $galeries[] = new Galerie($galerie);
    }
    return $galeries;
}

public function getIdGalerie($id)
{
    $req = $this->pdo->prepare("SELECT * FROM `galery` WHERE id = :id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $galerie = new Galerie($data);
    return $galerie;
}

public function createGalerie(Galerie $newGalerie)
{
    $req = $this->pdo->prepare("INSERT INTO `galery` (title, image) VALUES (:title, :image) ");
    $req->bindValue(":title", $newGalerie->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":image", $newGalerie->getImage(), PDO::PARAM_STR);
    $req->execute();
}

public function updateGalerie(Galerie $galerie)
{
    $req = $this->pdo->prepare("UPDATE `galery` SET title=:title, image=:image WHERE id=:id");
    $req->bindValue(":id", $galerie->getId(), PDO::PARAM_INT);
    $req->bindValue(":title", $galerie->getTitle(), PDO::PARAM_STR);
    $req->bindValue(":image", $galerie->getImage(), PDO::PARAM_STR);

    $req->execute();
}
public function deleteGalerie($id)
{
    $req = $this->pdo->prepare("DELETE FROM `galery` WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
}

}