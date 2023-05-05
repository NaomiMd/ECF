<?php
require_once _ROOT_ . '/Modal/Table.php';

class TableController
{
    private $pdo;
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:dbname=quai_antique;host=localhost;charset=utf8mb4', 'root', 'root');
        } catch(Exception $e) {
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
    $tables = [];
    $req = $this->pdo->query("SELECT * FROM `tables`");
    $data = $req->fetchAll();
    foreach($data as $table)
    {
        $tables[] = new Table($table);
    }
    return $tables;
}

public function getTableId(): Table
{
    $req =$this->pdo->query("SELECT * FROM `tables` WHERE id=:id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $table = new Table($data);
    return $table;
}
public function updateTable(Table $table)
{
    $req = $this->pdo->query("UPDATE `tables` SET `limited_seats`=:limited_seats WHERE id=:id");
    $req->bindValue(":limited_seats", $table->getLimited_seats(), PDO::PARAM_INT);
    $req->bindValue(":id", $table->getId(), PDO::PARAM_INT);

    $req->execute();
}

public function maxGuest()
{
    $req = $this->pdo->query('SELECT `limited_seats` FROM `tables`');
    $number_max_guest = $req->fetchColumn();
    return $number_max_guest;

}


}