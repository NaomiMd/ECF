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
</div>
<div class="container d-flex justify-content-center mt-5">
<div class="card border-dark  mb-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Horaires du quai antique</h5>
    <?php
    foreach($hours as $hour) :
    ?>
    <div class="text-center">
    <p><?= $hour->getOpening_morning(); ?></p>
    <p><?= $hour->getClosing_morning(); ?></p>
    <p><?= $hour->getOpening_night(); ?></p>
    <p><?= $hour->getClosing_night(); ?></p>
    
    <a href="updateHoraire.php?id=<?= $hour->getId(); ?>" class="btn btnCard" >Modifier</a>
    </div>
  </div>
  <?php endforeach; ?>
</div>
</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>