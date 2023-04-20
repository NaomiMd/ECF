<?php
require_once("../../config.php");
require_once _ROOT_ . '/templates/header.php';
require_once _ROOT_ . '/admin/navadmin.php';
require_once _ROOT_ . '/Controller/HourController.php';

$hourController = new HourController();
$hour = $hourController->getHourbyId($_GET['id']);

if(($_POST))
{

    $hour->hydrate(($_POST));
    $hourController->updateHour($hour);
    echo "<script>window.location.href='./horaires.php'</script>";
}

?>

<h3 class="text-center mt-5">Modifier les horaires du restaurant</h3>
<p class="text-center italic" >Merci de taper les horaires voulues</p>
<div class="container d-flex justify-content-center mt-5">
<form method="post">
    <label class="form-label mt-4" for="opening_morning">Horaire d'ouverture du déjeuner</label>
    <input type="time" name="opening_morning" class="form-control p-2" value="<?= $hour->getOpening_morning() ?>" >
    <label class="form-label mt-4" for="closing_morning">Horaire de fermeture du déjeuner</label>
    <input type="time" name="closing_morning" class="form-control p-2" value="<?= $hour->getClosing_morning() ?>" >
    <label class="form-label mt-4" for="opening_night">Horaire d'ouverture du dîner</label>
    <input type="time" name="opening_night" class="form-control p-2" value="<?= $hour->getOpening_night() ?>" >
    <label class="form-label mt-4" for="closing_night">Horaire de fermeture du dîner</label>
    <input type="time" name="closing_night" class="form-control p-2" value="<?= $hour->getClosing_night() ?>" >
<div class="container text-center mt-3">
    <button type="submit" class="btn btnCard">Modifier</button>
</div>
</form>

</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>