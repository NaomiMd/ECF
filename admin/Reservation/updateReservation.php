<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\ReservationController.php';
require_once _ROOT_ . '\Controller\UserController.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

$userController = new UserController();
$users = $userController->getAll();

$reservationController = new ReservationController();
$reservation = $reservationController->getReservationId($_GET['id']);

if($_POST)
{
    $reservation->hydrate($_POST);
    $reservationController->updateReservation($reservation);
    echo "<script>window.location.href='./reservation.php'</script>";
}

?>

<h3 class="text-center mt-5">Modifier la réservation</h3>
<div class="container d-flex justify-content-center mt-5">
<form method="post">
    <label class="form-label mt-4" for="date">Date</label>
    <input type="date" name="date" class="form-control p-2" value="<?= $reservation->getDate(); ?>" required >

    <label class="form-label mt-4" for="hour">Horaire</label>
    <input type="time" name="hour" class="form-control p-2" value="<?= $reservation->getHour();?>" required >

    <label class="form-label mt-4" for="number_of_guest">Nombre de convive(s)</label>
    <input type="text" name="number_of_guest" class="form-control p-2" value="<?= $reservation->getNumber_of_guest(); ?>" required>

    <label class="form-label mt-4" for="name">Nom du client</label>
    <input type="text" name="name" class="form-control p-2" value="<?= $reservation->getName(); ?>" required>

    <label class="form-label mt-4" for="allergy">Allergie(s)</label>
    <textarea name="allergy" id="" cols="30" rows="10" class="form-control p-2"></textarea>
    
    <label class="form-label mt-4" for="user_id">Adresse mail du client (si un compte existe) </label>
    <select name="user_id" class="form-select">
        <option value="" selected>Utilisateur</option>
        <?php foreach($users as $user) : ?>
            <option value="<?= $user->getId() ?>"><?= $user->getEmail(); ?></option>
    <?php endforeach ; ?>   
    </select>


<div class="container text-center mt-3 mb-5">
    <button type="submit" class="btn btnCard">Modifier</button>
</div>
</form>

</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>