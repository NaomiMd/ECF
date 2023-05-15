<?php
require_once _ROOT_ . '/Modal/User.php';

class UserController
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
    $users = [];
    $req = $this->pdo->query("SELECT * FROM `user`");
    $data = $req->fetchAll();
    foreach($data as $user)
    {
        $users[] = new User($user);
    }
    return $users;
}

public function getUserId($id): User
{
    $req = $this->pdo->prepare("SELECT * FROM `user` WHERE id=:id");
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $user = new User($data);
    return $user;
}

public function createUser(User $newUser)
{
    $req = $this->pdo->prepare("INSERT INTO `user` (email, password, allergy, number_of_guest, role) VALUES (:email, :password, :allergy, :number_of_guest, :role)");
    $hashedPassword = password_hash($newUser->getPassword(), PASSWORD_BCRYPT);
    $role = 'subscriber';
    $req->bindValue(":email", $newUser->getEmail(), PDO::PARAM_STR);
    $req->bindValue(":password", $hashedPassword, PDO::PARAM_STR);
    $req->bindValue(":allergy", $newUser->getAllergy(), PDO::PARAM_STR);
    $req->bindValue(":number_of_guest", $newUser->getNumber_of_guest(), PDO::PARAM_INT);
    $req->bindValue(":role", $role, PDO::PARAM_STR);
    $req->execute();
}

public function deleteUser(int $id)
{
    $req = $this->pdo->prepare("DELETE FROM `user` WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
}


public function verifyLoginUser(string $email, string $password)
{
    $req= $this->pdo->prepare("SELECT * FROM user WHERE email=:email");
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->execute();
    $user = $req->fetch();

    if($user && password_verify($password, $user['password']))
    {
        return $user;
    }else{
        return false;
    }
}
}