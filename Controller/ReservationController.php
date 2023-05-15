<?php
require_once _ROOT_ . '/Modal/Reservation.php';
class ReservationController
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
    $reservations = [];
    $req = $this->pdo->query("SELECT * FROM `reservation`");
    $data = $req->fetchAll();
    foreach($data as $reservation)
    {
        $reservations[] = new Reservation($reservation);
    }
    return $reservations;
}

public function getReservationId($id) : Reservation
{
    $req = $this->pdo->prepare("SELECT * FROM `reservation` WHERE id = :id");
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $reservation = new Reservation($data);
    return $reservation;
}

public function createReservation(Reservation $newReservation)
{
    $req = $this->pdo->prepare("INSERT INTO `reservation` (date, hour, number_of_guest, name, email allergy, user_id, table_id) VALUES (:date, :hour, :number_of_guest, :name, :email, :allergy, :user_id, :table_id) ");
    $req->bindValue(':date', $newReservation->getDate(), PDO::PARAM_STR);
    $req->bindValue(':hour', $newReservation->getHour(), PDO::PARAM_STR);
    $req->bindValue(':number_of_guest', $newReservation->getNumber_of_guest(), PDO::PARAM_INT);
    $req->bindValue(':name', $newReservation->getName(), PDO::PARAM_STR);
    $req->bindValue(':email', $newReservation->getEmail(), PDO::PARAM_STR);
    $user_id = $newReservation->getUser_id();
    $req->bindValue(':allergy', $newReservation->getAllergy(), PDO::PARAM_STR);
    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $req->bindValue(':table_id', $newReservation->getTable_id(), PDO::PARAM_INT);

    $req->execute();
}

public function updateReservation(Reservation $reservation)
{
    $req = $this->pdo->prepare("UPDATE `reservation` SET date=:date, hour=:hour, number_of_guest=:number_of_guest, name=:name, email=:email, allergy=:allergy, user_id=:user_id, table_id=:table_id  WHERE id=:id");
    $req->bindValue(':date', $reservation->getDate(), PDO::PARAM_STR);
    $req->bindValue(':hour', $reservation->getHour(), PDO::PARAM_STR);
    $req->bindValue(':number_of_guest', $reservation->getNumber_of_guest(), PDO::PARAM_INT);
    $req->bindValue(':name', $reservation->getName(), PDO::PARAM_STR);
    $req->bindValue(':email', $reservation->getEmail(), PDO::PARAM_STR);
    $req->bindValue(':allergy', $reservation->getAllergy(), PDO::PARAM_STR);
    $req->bindValue(':user_id', $reservation->getUser_id(), PDO::PARAM_INT);
    $req->bindValue(':table_id', $reservation->getTable_id(), PDO::PARAM_INT);

    $req->bindValue(':id', $reservation->getId(), PDO::PARAM_INT);

    $req->execute();
}
public function deleteReservation($id)
{
    $req = $this->pdo->prepare("DELETE FROM `reservation` WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
}

public function booking()
{
    $req = $this->pdo->prepare('SELECT SUM (number_of_guest) FROM `reservation` WHERE date=:date');
    $req->bindParam(':date', $date, PDO::PARAM_STR);
    $req->execute();
    $guest = $req->fetchColumn();
    $guest = intval($date);
    return $guest;
}


}