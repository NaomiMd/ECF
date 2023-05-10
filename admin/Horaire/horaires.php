<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\HourController.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

$hourController = new HourController();
$hours = $hourController->getAll();
$error = null;
?>
<div class="text-center mt-5">
  <h3>Horaires</h3>
  <div class="underline"></div>
</div>

<div class="container mt-5">
<div class="table-responsive">
<table class="table table-bordered" width="100%" cellspacing="0">
  <thead>
  <tr>
    <th>Horaire d'ouverture déjeuner</th>
    <th>Horaire de fermeture déjeuner</th>
    <th>Horaire d'ouverture dîner</th>
    <th>Horaire de fermeture dîner</th>
    <th>Opération</th>
  </tr>
</thead>
<tbody>
<?php
    foreach($hours as $hour) :
?>
  <tr>
    <th><?= $hour->getOpening_morning(); ?></th>
    <th><?= $hour->getClosing_morning(); ?></th>
    <th><?= $hour->getOpening_night(); ?></th>
    <th><?= $hour->getClosing_night(); ?></th>
    <th><a href="updateHoraire.php?id=<?= $hour->getId(); ?>" class="btn btnCard" >Modifier</a></th>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>