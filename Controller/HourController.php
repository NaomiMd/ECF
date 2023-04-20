<?php
require_once _ROOT_ . '/Modal/Hour.php';
class HourController
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

public function getAll(): array
{
    $hours = [];
    $req = $this->pdo->query("SELECT * FROM `hour`");
    $data = $req->fetchAll();
    foreach($data as $hour)
    {
        $hours[] = new Hour($hour);
    }
    return $hours;
}

public function getHourbyId($id) : Hour
{
    $req = $this->pdo->prepare("SELECT * FROM `hour` WHERE id = :id");
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $hour = new Hour($data);
    return $hour;
}

public function createHour(Hour $newHour)
{
    $req = $this->pdo->prepare("INSERT INTO `hour` (opening_morning, closing_morning, opening_night, closing_night) VALUES (:opening_morning, :closing_morning, :opening_night, :closing_night) ");
    $req->bindValue(':opening_morning', $newHour->getOpening_morning(), PDO::PARAM_STR);
    $req->bindValue(':closing_morning', $newHour->getClosing_morning(), PDO::PARAM_STR);
    $req->bindValue(':opening_night', $newHour->getOpening_night(), PDO::PARAM_STR);
    $req->bindValue(':closing_night', $newHour->getClosing_night(), PDO::PARAM_STR);
    $req->execute();
}

public function updateHour(Hour $hour)
{
    $req = $this->pdo->prepare("UPDATE `hour` SET opening_morning=:opening_morning, closing_morning=:closing_morning, opening_night=:opening_night, closing_night=:closing_night WHERE id=:id");
    $req->bindValue(":id", $hour->getId(), PDO::PARAM_INT);
    $req->bindValue(':opening_morning', $hour->getOpening_morning(), PDO::PARAM_STR);
    $req->bindValue(':closing_morning', $hour->getClosing_morning(), PDO::PARAM_STR);
    $req->bindValue(':opening_night', $hour->getOpening_night(), PDO::PARAM_STR);
    $req->bindValue(':closing_night', $hour->getClosing_night(), PDO::PARAM_STR);

    $req->execute();
}
public function deleteHour(int $id)
{
    $req = $this->pdo->prepare("DELETE FROM `hour` WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
}
}