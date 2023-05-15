<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\ReservationController.php';
require_once _ROOT_ . '\Controller\UserController.php';
require_once _ROOT_ . '\Controller\TableController.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

if(isset($_GET['page']) && !empty($_GET['page']))
{
  $currentPage = (int) strip_tags($_GET['page']);
}else{
  $currentPage = 1;
}

$reservationController = new ReservationController();
$reservations = $reservationController->getAll();
$tableController = new TableController();
$tables = $tableController->getAll();
$userController = new UserController();

?>

<div class="text-center mt-5">
  <h3>Réservation</h3>
</div>
<div class="underline"></div>
<?php
foreach($tables as $table) :
?>
<div class="container">
    <p>Nombre de places limite: <?= $table->getLimited_Seats(); ?> </p>
</div>
<?php endforeach; ?>

<div class="container mt-4">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
        <th>ID</th>
        <th>Nom pour la réservation</th>
        <th>Email</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Nombre de convive(s)</th>
        <th>Allergie(s)</th>
        <th>Opérations</th>
        </tr>
      </thead>
      <?php
      foreach($reservations as $reservation) :
        $date = new DateTime($reservation->getDate());
    ?>   
    <tbody>
      <tr>
        <th><?= $reservation->getId(); ?></th>
        <th><?= $reservation->getName(); ?></th>
        
        <th><?= $reservation->getEmail(); ?></th>
        <th><?= $reservation->getDate(); ?></th>
        <th><?= $reservation->getHour(); ?></th>
        <th><?= $reservation->getNumber_Of_Guest(); ?> </th>
        <th><?= $reservation->getAllergy(); ?></th>
        <th>
        <a href="updateReservation.php?id=<?= $reservation->getId(); ?>" class="btn btnCard">Modifier</a>
        <a href="deleteReservation.php?id=<?= $reservation->getId(); ?>" class="btn btnCard">Supprimer</a>
        </th>
      </tr>
    </tbody>
    <?php endforeach; ?>
    </table>
  </div>
</div>
<?php 
require_once _ROOT_ . '\admin\footer.php';
?>