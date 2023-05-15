<?php
require_once('./config.php');
require_once _ROOT_ . '\Controller\ReservationController.php';
require_once _ROOT_ . '\Controller\TableController.php';
require_once _ROOT_ . '\Controller\UserController.php';

$reservationController = new ReservationController();
$tableController = new TableController();
$tables = $tableController->maxGuest();
$userController = new UserController();


if($_POST)
{
  $reservation = $reservationController->booking();
  if($reservation > $tables)
  {
    echo '<h5 class="text-center">Jour complet</h5>';
  }
  $newReservation = new Reservation($_POST);
  $reservationController->createReservation($newReservation);
  echo"<script>window.location.href='templates/reservationConfirmation.php'</script>";
}
?>

<div class="container" id="reservation" >
    <p class="text-center mb-5" >Merci de mentionner si nécessaire les allergies<br/>
des convives assistants au repas. <br/>
Pour tout retard de plus de 20min votre table<br/>
sera donnée à d'autre client, merci de votre
compréhension.
</p>

<div class="container mt-2">
<form method="post">
<div class="input-group">
  <select name="number_of_guest" class="form-select" required>
    <option selected>Nombre de convives</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  </select>
  <label class="input-group-text" for="number_of_guest"><i class="bi bi-people" id="people"></i></label>
</div>

<div class="input-group mt-3">
<input placeholder="Cliquez et sélectionnez le jour qui vous convient" class="form-control" type="text" name="date" id="datepicker" value="" required>
<label for="date" class="input-group-text"><i class="bi bi-calendar4-week"></i></label>
</div>

<div class="input-group mt-3">
    <input type="text" placeholder="Choissisez votre horaire" class="form-control" name="hour" id="datetimepicker5" required>
    <label for="hour" class="input-group-text"><i class="bi bi-clock"></i></label>
</div>

<hr>
<?php if(!isset($_SESSION['user'])) { ?>
<div class="input">
  <label for="allergy" class="form-label">Mention des allergies</label>
  <textarea class="form-control" name="allergy" id="" cols="10" rows="5"> </textarea>
</div> 
</div>
<hr>
<?php  } ; ?>
<div class="m-3">
  <label for="name" class="form-label">Nom pour la réservation</label>
  <input type="text" name="name" class="form-control" placeholder="Nom pour la réservation" required>
</div>

<div class="m-3">
  <label for="email" class="form-label">Email</label>
  <input type="text" placeholder="Hojs@exemple.com" name="email" class="form-control" value="<?php if(isset($_SESSION["user"])){ echo $_SESSION['user']['email'] ;}else{} ?>" required>
</div>

<!-- endif -->
<div class="mb-3 mt-4">
  <button type="submit" class="btn-confirm">Confirmer</button>
  <a href="<?= generateLink('index.php') ?>" class="btn-retour">Retour</a>
</div>
</form>

</div>
</div> 


